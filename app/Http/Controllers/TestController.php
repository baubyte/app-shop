<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function welcome()
    {
    	//$a=10;
    	//$b=5;
    	//$c=$a+$b;
    	return view ('welcome');
    	//return "El valor de la sumas es: $c";
    }
};
