<?php

namespace App\Http\Controllers\admin;

use App\Dande;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DandeController extends Controller
{
    public function index(){
        $dande = Dande::paginate(30);
        return view('/admin/dande/index',[
           'dande' => $dande
        ]);
    }
}
