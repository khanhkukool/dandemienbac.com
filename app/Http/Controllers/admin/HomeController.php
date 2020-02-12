<?php

namespace App\Http\Controllers\admin;

use App\Cards;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $cards = Cards::paginate(30);
        return view('admin/cards/index', [
            'cards' => $cards
        ]);
    }

    public function create()
    {
        $cards = Cards::all();
        return view('admin/cards/create', [
            'cards' => $cards
        ]);
    }

    public function store(Request $request)
    {
//        var_dump($request->all());
        //Check error form
        $rule = [
            'pin' => ['required', 'min:13', 'max:15'],
            'seri' => ['required', 'min:11', 'max:15']
        ];
        $messages = [
            'pin.required' => 'Không được để trống mã pin',
            'seri.required' => 'Không được để trống mã seri',
            'pin.min' => 'Mã pin phải có từ 13 đến 15 số',
            'seri.min' => 'Mã seri phải có từ 11 đến 15 số',
            'pin.max' => 'Mã pin phải có từ 11 đến 15 số',
            'seri.max' => 'Mã seri phải có từ 11 đến 15 số',
        ];
        $request->validate($rule, $messages);
//    die;
        //Connect napthengay
        header('Content-Type: text/html; charset=utf-8');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        set_time_limit(0);

        $seri = isset($_POST['seri']) ? $_POST['seri'] : '';
        $sopin = isset($_POST['pin']) ? $_POST['pin'] : '';
        $card_value = 10000;
//Loai the cao (VINA, MOBI, VIETEL, VTC, GATE)
        $mang = 1; //Viettel
        $user = 'khanhkuku99@gmail.com';
        $ten = "Vietel";

//Mã MerchantID dang kí trên napthengay.com
        $merchant_id = '4300';
//Api email, email tai khoan dang ky tren napthengay.com
        $api_email = 'khanhkuku99@gmail.com';
//mat khau di kem ma website dang kí trên  napthengay.com
        $secure_code = '0fb33ae3dd4a9d322d1617d4f603a160';
//mã giao dịch
        $trans_id = time();  //mã giao dịch do bạn gửi lên, Napthengay.com sẽ trả về
        $api_url = 'http://api.napthengay.com/v2/';


        $arrayPost = array(
            'merchant_id' => intval($merchant_id),
            'api_email' => trim($api_email),
            'trans_id' => trim($trans_id),
            'card_id' => trim($mang),
            'card_value' => intval($card_value),
            'pin_field' => trim($sopin),
            'seri_field' => trim($seri),
            'algo_mode' => 'hmac'
        );

        $data_sign = hash_hmac('SHA1', implode('', $arrayPost), $secure_code);

        $arrayPost['data_sign'] = $data_sign;

        $curl = curl_init($api_url);

        curl_setopt_array($curl, array(
            CURLOPT_POST => true,
            CURLOPT_HEADER => false,
            CURLINFO_HEADER_OUT => true,
            CURLOPT_TIMEOUT => 120,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => http_build_query($arrayPost)
        ));

        $data = curl_exec($curl);

        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $result = json_decode($data, true);

        $time = time();

        if ($status == 200) {
            $amount = $result['amount'];
            switch ($amount) {
                case 10000:
                    $xu = 10000;
                    break;
                case 20000:
                    $xu = 20000;
                    break;
                case 50000:
                    $xu = 50000;
                    break;
                case 100000:
                    $xu = 100000;
                    break;
                case 200000:
                    $xu = 200000;
                    break;
                case 500000:
                    $xu = 500000;
                    break;
            }

            if ($result['code'] == 100) {
                $card_model = new Cards();

                $card_model->pin = $request->get('pin');
                $card_model->seri = $request->get('seri');
                $card_model->card_value = 10000;
                $card_model->save();

                session()->flash("success");
                return redirect('admin/index');
            } else {
                //bt lỗi là do nó chạy vào đây à e.
                session()->flash("error");
                session()->put('result', $result);
                session()->put('date',date('d-m-y'));
                return redirect('admin/cards/create');
                //do dòng này, nếu e return về view, thì nó hiểu là e đang gọi cái view của create vào cái phương thúc store này
                //dẫn đến khi e submit lại form thì sẽ là submit form của method store nr, ko phải phải của method create nữa
                //nên cần phải sử dụng chuyển hướng về lại trang create nhé, và gán biến $result vào sesion nhé
//                return view('/admin/cards/create', [
//                    'result' => $result
//                ]);
            }
        } else {
            echo 'Status Code:' . $status . ' . Máy chủ gặp sự cố<hr >';
        }
    }
}
