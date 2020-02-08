<?php

namespace App\Http\Controllers\admin;

use App\Dande;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DandeController extends Controller
{
    public function index(){
        $dandes = Dande::paginate(30);
        return view('/admin/dande/index',[
           'dandes' => $dandes,
        ]);
    }

    public function create(){
        $dandes = Dande::all();
        return view('admin/dande/create',[
            'dandes' => $dandes
        ]);
    }

    public function store(Request $request){
        $dande_model = new Dande();

        $dande_model->so_lo = $request->get('so_lo');
        $dande_model->so_de = $request->get('so_de');
        $dande_model->status = 0;
        $dande_model->save();

        $is_update = 0;
        return redirect('admin/dande/index');
    }

    public function edit(Request $request, $id) {
        //lấy ra tin tức theo id
        $dande_model = new Dande();
        $dandes = $dande_model->getById($id);
        return view('admin/dande/edit', [
            'dandes' => $dandes
        ]);
    }

    public function update(Request $request, $id){
        $dande_model = new Dande();
        $dande = $dande_model->getById($id);

        $so_lo = $request->get('so_lo');
        $so_de = $request->get('so_de');
        $result_lo = $request->get('result_lo');
        $result_de = $request->get('result_de');

        $dande->so_lo = $so_lo;
        $dande->so_de = $so_de;
        $dande->result_lo = $result_lo;
        $dande->result_de = $result_de;
        $dande->status = 1;

        $dande->save();

        return redirect('admin/dande/index');
    }
}
