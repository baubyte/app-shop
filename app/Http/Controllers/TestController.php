<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function welcome()
    {
    	//$a=10;
    	//$b=5;
    	//$c=$a+$b;
    	//return "El valor de la sumas es: $c";

    	$categories = Category::get();
    	return view ('welcome')->with(compact('categories'));
    }
};
