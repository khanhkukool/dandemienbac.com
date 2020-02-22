<?php

namespace App\Http\Controllers;

use App\Cards;
use App\Dande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dandes = Dande::orderBy('id', 'desc')->where('id', '!=', DB::table('dande')->max('id'))->paginate(30);
        $dande_time_today = DB::table('dande')->latest('id')->first();
        session()->put('dande_time_today', $dande_time_today);
        return view('home/index', [
            'dandes' => $dandes,
        ]);

    }

    public function create(Request $request)
    {
        //Check error form
//        $dande_today = DB::table('dande')->latest()->first();
//        session()->put('dande_today', $dande_today);
//        echo "<pre>";
//        print_r(session()->get('dande_today'));
//        echo "</pre>";
//        die();
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

        //Connect napthengay
        header('Content-Type: text/html; charset=utf-8');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        set_time_limit(0);

        $seri = isset($_POST['seri']) ? $_POST['seri'] : '';
        $sopin = isset($_POST['pin']) ? $_POST['pin'] : '';
        $card_value = 20000;
//Loai the cao (VINA, MOBI, VIETEL, VTC, GATE)
        $mang = 1; //Viettel
        $user = 'cntt510@gmail.com';
        $ten = "Vietel";

//Mã MerchantID dang kí trên napthengay.com
        $merchant_id = '4297';
//Api email, email tai khoan dang ky tren napthengay.com
        $api_email = 'cntt510@gmail.com';
//mat khau di kem ma website dang kí trên  napthengay.com
        $secure_code = '339b6186396da6920102ed0ad0bd8b0c';
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

//        echo print_r($arrayPost);
//        die();
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

        $dandes = Dande::paginate(30);

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
                $card_model->card_value = 20000;
                $card_model->save();


                $dande_today = DB::table('dande')->latest('id')->first();


                session()->put('card_session',date('d-m-Y'));
                session()->flash("success");
                session()->put('dande_today', $dande_today);
                return redirect('/');
            } else {

                session()->flash("error");
                session()->put('result', $result);

                return redirect('/');
            }
        } else {
            echo 'Status Code:' . $status . ' . Máy chủ gặp sự cố<hr >';
        }
    }

    public function getLogin()
    {
        return view('admin/login/login');
    }

    public function postLogin(Request $request)
    {
        $credentials = array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($credentials)){
            return redirect('admin/index');
        }
        else{
            session()->flash("error_login");
            return redirect('login');
        }
    }

    public function postLogout(){
        Auth::logout();
        return redirect('/');
    }
}
