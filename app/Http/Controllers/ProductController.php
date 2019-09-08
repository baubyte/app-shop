<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
     public function show(Product $product)
    {
       	$images = $product->images;
      
      // Repartir las imágenes al lado izquierdo y derecho
    	$imagesLeft  = collect();
    	$imagesRight = collect();
      foreach ($images as $key => $image)
      {
    		if ($key%2 == 0) {
    			$imagesLeft->push($image);
        }	else {
    			$imagesRight->push($image);
        }
    	}
      
    	return view('products.show')->with(compact('product', 'imagesLeft', 'imagesRight'));
    }
}
