<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
    public function welcome()
    {
    	//$a=10;
    	//$b=5;
    	//$c=$a+$b;
    	//return "El valor de la sumas es: $c";
    	
    	$products = Product::all();
    	return view ('welcome')->with(compact('products'));
    }
};
