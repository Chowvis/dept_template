<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\External_logo;
use App\Models\Headofminister;
use Illuminate\Http\Request;

class main_page extends Controller
{
    public function show(){
        $dbaddress = About::where('id','=',1)->first();
        $card1 = Headofminister::where('card_place','=','1')->first();
        $card2 = Headofminister::where('card_place','=','2')->first();
        $logo1 = External_logo::where('logo_no','=','1')->first();
        return view('welcome',[
            'dbaddress' => $dbaddress,
            'card1' => $card1,
            'card2' => $card2,
            'logo1' => $logo1,
        ]);
    }
}
