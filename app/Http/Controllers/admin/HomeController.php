<?php

namespace App\Http\Controllers\admin;

use App\Cards;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $cards = Cards::paginate(30);
        return view('admin/cards/index',[
            'cards' => $cards
        ]);
    }

    public function create(){
        $cards = Cards::all();
        return view('admin/cards/create',[
            'cards' => $cards
        ]);
    }

    public function store(Request $request){
        $rule = [
            'pin' => ['required','min:13','max:15'],
            'seri' => ['required','min:11','max:15']
        ];
        $messages = [
            'pin.required' => 'Không được để trống mã pin',
            'seri.required' => 'Không được để trống mã seri',
            'pin.min' => 'Mã pin phải có từ 13 đến 15 số',
            'seri.min' => 'Mã seri phải có từ 11 đến 15 số',
            'pin.max' => 'Mã pin phải có từ 11 đến 15 số',
            'seri.max' => 'Mã seri phải có từ 11 đến 15 số',
        ];

        $request->validate($rule,$messages);

        $card_model = new Cards();

        $card_model->pin = $request->get('pin');
        $card_model->seri = $request->get('seri');
        $card_model->card_value = 200000;
        $card_model->save();

        return redirect('admin/index');
    }
}
