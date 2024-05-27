<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Headofminister;
use Illuminate\Http\Request;

class main_page extends Controller
{
    public function show(){
        $dbaddress = About::where('id','=',1)->first();
        $card1 = Headofminister::where('card_place','=','1')->first();

        return view('welcome',[
            'dbaddress' => $dbaddress,
            'card1' => $card1,
        ]);
    }
}
