<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\Provider;
use App\ProductImage;
use App\Colour;
use App\Waist;

class ProductController extends Controller
{
    
    public function index()
    {
    	$products = Product::paginate(15);
    	return view('admin.products.index')->with(compact('products')); //Listado de los Productos
    }
        public function create()
    {
    	$categories = Category::orderBy('name')->get();
        $providers = Provider::orderBy('name')->get();
        $colours = Colour::orderBy('name')->get();
        $waists = Waist::orderBy('name')->get();
    	return view('admin.products.create')->with(compact('categories','providers','colours','waists')); //Formulario de Alta de los Productos
    }
        public function store(Request $request)
    {
    	//Guardar el Alta de Los Productos  
    	//dd($request->all());
    	//Validaciones y mensajes personalizados
    	
		$messages = [
			'name.required' => 'Es necesario ingresar un Cod. de Producto.',
			'name.min'      => 'El codigo de producto debe tener al menos 3 caracteres.',
			'description.required' => 'Es necesario ingresar una descripcion corta.',
			'description.max' => 'La descripción corta solo admite hasta 200 caracteres.',
			'waists.required' => 'Es necesario ingresar los Talles Disponibles.',
			'waists.max' => 'Los Talles Disponibles solo admite hasta 200 caracteres.',
			'colours.required' => 'Es necesario ingresar los Colores Disponibles.',
			'colours.max' => 'Los Colores Disponibles solo admite hasta 200 caracteres.',
			'price.required'  => 'Es necesario definir un precio al producto.',
			'price.numeric'   => 'Ingrese un precio valido.',
			'price.min'       => 'No se admiten valores negativos.',
			'cost_price.required'  => 'Es necesario definir un precio de costo al producto.',
			'cost_price.numeric'   => 'Ingrese un precio valido.',
			'cost_price.min'       => 'No se admiten valores negativos.',
			'providers.required' => 'Es necesario selecionar un Proveedor.',
			'category_id.required' => 'Es necesario selecionar una Marca.'
		];
		
		$rules = [
			'name' => 'required|min:3',
			'description' => 'required|max:200',
			'waists' => 'required|max:200',
			'colours' => 'required|max:200',
			'price' => 'required|numeric|min:0' ,//No negativos
			'cost_price' => 'required|numeric|min:0', //No negativos
			'providers' => 'required',
			'category_id' => 'required'
		];

		$this->validate($request, $rules, $messages);

    	//Instanciamos 
    	$product = new Product();
    	//Recibimos los datos
    	$product->name = $request->input('name');
    	$product->price = $request->input('price');
    	$product->waists = $request->input('waists');
    	$product->colours = $request->input('colours');
    	$product->description = $request->input('description');
    	$product->long_description = $request->input('long_description');
    	$product->cost_price = $request->input('cost_price');
    	$product->providers = $request->input('providers');
    	$product->category_id = $request->input('category_id');;
    	
    	$product->save();//Insertamos los Datos en la Base

    	return redirect('admin/products/');
    }
 		public function edit($id)
    {
    	$product = Product::find($id);
    	$categories = Category::orderBy('name')->get();
        $providers = Provider::orderBy('name')->get();
    	return view('admin.products.edit')->with(compact('product','categories','providers')); //Formulario de Edicion de los Productos
    }
        public function update(Request $request, $id)
    {
    	//Buscamos el Producto $product = Product::find($id);
    	
    	//Validaciones y mensajes personalizados
    	
		$messages = [
			'name.required' => 'Es necesario ingresar un Cod. de Producto.',
			'name.min'      => 'El codigo de producto debe tener al menos 3 caracteres.',
			'description.required' => 'Es necesario ingresar una descripcion corta.',
			'description.max' => 'La descripción corta solo admite hasta 200 caracteres.',
			'waists.required' => 'Es necesario ingresar los Talles Disponibles.',
			'waists.max' => 'Los Talles Disponibles solo admite hasta 200 caracteres.',
			'colours.required' => 'Es necesario ingresar los Colores Disponibles.',
			'colours.max' => 'Los Colores Disponibles solo admite hasta 200 caracteres.',
			'price.required'  => 'Es necesario definir un precio al producto.',
			'price.numeric'   => 'Ingrese un precio valido.',
			'price.min'       => 'No se admiten valores negativos.',
			'cost_price.required'  => 'Es necesario definir un precio de costo al producto.',
			'cost_price.numeric'   => 'Ingrese un precio valido.',
			'cost_price.min'       => 'No se admiten valores negativos.',
			'providers.required' => 'Es necesario selecionar un Proveedor.',
			'category_id.required' => 'Es necesario selecionar una Marca.'
		];
		
		$rules = [
			'name' => 'required|min:3',
			'description' => 'required|max:200',
			'waists' => 'required|max:200',
			'colours' => 'required|max:200',
			'price' => 'required|numeric|min:0' ,//No negativos
			'cost_price' => 'required|numeric|min:0', //No negativos
			'providers' => 'required',
			'category_id' => 'required'
		];

		$this->validate($request, $rules, $messages);

    	//Recibimos los datos
    	$product->name = $request->input('name');
    	$product->price = $request->input('price');
    	$product->waists = $request->input('waists');
    	$product->colours = $request->input('colours');
    	$product->description = $request->input('description');
    	$product->long_description = $request->input('long_description');
    	$product->cost_price = $request->input('cost_price');
    	$product->providers = $request->input('providers');
    	$product->category_id = $request->input('category_id');
    	
    	$product->save();//Actualizamos los Datos en la Base

    	return redirect('admin/products/');
    }
        public function destroy($id)
    {
    	//Buscamos el Producto
    	$product = Product::find($id);
    	$product->delete();//Eliminamos los Datos en la Base

    	return back();
    }
}
