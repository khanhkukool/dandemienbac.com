<?php

namespace App\Http\Controllers\admin;

use App\Dande;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use KubAT\PhpSimple\HtmlDomParser;
use Illuminate\Support\Facades\DB;

class DandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $dandes = Dande::paginate(30);
		$dande_time_today = DB::table('dande')->latest('id')->first();
        return view('/admin/dande/index', [
            'dandes' => $dandes,
			'dande_time_today' => $dande_time_today
        ]);
    }

    public function create()
    {
        $dandes = Dande::all();
        return view('admin/dande/create', [
            'dandes' => $dandes
        ]);
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $dandes = Dande::all('created_at');
        foreach ($dandes AS $value){
            if((date('d-m-Y', strtotime($value->created_at))) == date('d-m-Y',strtotime($request->get('created_at')))){
                $rule = [
                    'created_at' => 'date_equals:'.$value
                ];
                $messages = [
                    'created_at.date_equals' => 'Ngày này đã được tạo',
                ];
                $request->validate($rule, $messages);
            }
        }

        $dande_model = new Dande();

        $dande_model->so_lo = $request->get('so_lo');
        $dande_model->so_de = $request->get('so_de');
        $dande_model->created_at = $request->get('created_at');
        $dande_model->status = 0;
        $dande_model->save();

        $is_update = 0;
        return redirect('admin/dande/index');
    }

    public function edit(Request $request, $id)
    {
        //lấy ra tin tức theo id
        $dande_model = new Dande();
        $dandes = $dande_model->getById($id);
        return view('admin/dande/edit', [
            'dandes' => $dandes
        ]);
    }

    public function update(Request $request, $id)
    {
        $dande_model = new Dande();
        $dande = $dande_model->getById($id);

        $so_lo = $request->get('so_lo');
        $so_de = $request->get('so_de');

        $dande->so_lo = $so_lo;
        $dande->so_de = $so_de;

        $dande->status = 1;

        $dande->save();

        return redirect('admin/dande/index');
    }

    public function updateResult($id)
    {
        $dande_model = new Dande();
        $dande = $dande_model->getById($id);
        $result_lo_array = [
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_1_0', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_2_0', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_2_1', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_3_0', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_3_1', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_3_2', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_3_3', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_3_4', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_3_5', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_4_0', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_4_1', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_4_2', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_4_3', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_5_0', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_5_1', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_5_2', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_5_3', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_5_4', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_5_5', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_6_0', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_6_1', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_6_2', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_7_0', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_7_1', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_7_2', 0)->innertext(), -2),
            substr(HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
                ->find('#rs_7_3', 0)->innertext(), -2)
        ];
        $result_de = HtmlDomParser::file_get_html('https://ketqua.net/xo-so-truyen-thong.php?ngay=' . date('d-m-Y', strtotime($dande->created_at)))
            ->find('#rs_0_0', 0)->innertext();

        //update result_lo
        $so_lo_array = explode(";", $dande->so_lo);

        $dande_result_lo = '';
        foreach($so_lo_array AS $value_lo){
            foreach ($result_lo_array AS $value_result){
                if((substr($value_result,-2)) == trim($value_lo)){
                     $dande_result_lo .= $value_lo . ' ';
                }
            }
        }

         if ($dande_result_lo == '') {
            $dande->result_lo = "Trượt";
        } else {
            $dande->result_lo = $dande_result_lo;
        }

        //update result_de
		$dande_result_de = '';
        $so_de_array = explode(";", $dande->so_de);

        foreach ($so_de_array AS $value) {
            if (substr($result_de, -2) == trim($value)) {
                $dande_result_de = substr($result_de, -2);
                break;
            }
        }

        if ($dande_result_de == '') {
            $dande->result_de = "Trượt";
        } else {
            $dande->result_de = $dande_result_de;
        }

        $dande->save();
        return redirect('admin/dande/index');
    }
}
