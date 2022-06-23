<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function print()
    {
        // echo "welcome"; // X MVC
        $sum = $this->add(5,6);
        $result = 15;
        return view('print',compact('sum','result'));
    }

    private function add($number1, $number2)
    {
       return $number1 + $number2;
    }
}
