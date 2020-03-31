<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")->paginate(10);
        /**Vemos si la Coincidencia es un Producto es decir exacta le llevamos al producto */
        if ($products->count() == 1) {
            $id = $products->first()->id;
            return redirect("products/$id");// 'products/'.$id
        }
        return view('search.show')->with(compact('products', 'query'));
    }
    public function data()
    {
        $products = Product::pluck('name');//Devuelve un arreglo con todos los nombres de los productos
        return $products;
    }
}
