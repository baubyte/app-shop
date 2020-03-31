<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

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
    	$products = Product::paginate(10);
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
			'waist.required' => 'Es necesario ingresar los Talles Disponibles.',
			'waist.max' => 'Los Talles Disponibles solo admite hasta 200 caracteres.',
			'colour.required' => 'Es necesario ingresar los Colores Disponibles.',
			'colour.max' => 'Los Colores Disponibles solo admite hasta 200 caracteres.',
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
			'waist' => 'required|max:200',
			'colour' => 'required|max:200',
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

        /*=============================================
        =  RECIBIMOS LOS COLORES Y LO CONCATENAMOS    =
        =============================================*/
        $colours="";
        foreach ($request->input('colour') as $colour) {
            $colours .= $colour.'; ';
        }
        //INSERTAMOS LOS COLORES Y LIMPIAMOS EL ULTIMO CARACTER
         $product->colours =rtrim($colours,'; ') ;
        /*===== FIN RECIBIMOS LOS COLORES Y LO CONCATENAMOS   ======*/

        /*=============================================
        =  RECIBIMOS LOS TALLES Y LO CONCATENAMOS    =
        =============================================*/
        $waists="";
        foreach ($request->input('waist') as $waist) {
            $waists .= $waist.'; ';
        }
        //INSERTAMOS LOS TALLES Y LIMPIAMOS EL ULTIMO CARACTER
        $product->waists = rtrim($waists,'; ');
    	/*===== FIN RECIBIMOS LOS TALLES Y LO CONCATENAMOS   ======*/

    	$product->description = $request->input('description');
    	$product->long_description = $request->input('long_description');
    	$product->cost_price = $request->input('cost_price');
    	$product->provider_id = $request->input('providers');
    	$product->category_id = $request->input('category_id');;

    	$product->save();//Insertamos los Datos en la Base

    	return redirect('admin/products/');
    }
 		public function edit($id)
    {
    	$product = Product::find($id);
    	$categories = Category::orderBy('name')->get();
        $providers = Provider::orderBy('name')->get();
        $colours = Colour::orderBy('name')->get();
        $waists = Waist::orderBy('name')->get();
    	return view('admin.products.edit')->with(compact('product','categories','providers','colours','waists')); //Formulario de Edicion de los Productos
    }

        public function update(Request $request, $id)
    {
    	//Buscamos el Producto

        $product = Product::find($id);

    	//Validaciones y mensajes personalizados

		$messages = [
			'name.required' => 'Es necesario ingresar un Cod. de Producto.',
			'name.min'      => 'El codigo de producto debe tener al menos 3 caracteres.',
			'description.required' => 'Es necesario ingresar una descripcion corta.',
			'description.max' => 'La descripción corta solo admite hasta 200 caracteres.',
			'waist.required' => 'Es necesario ingresar los Talles Disponibles.',
			'waist.max' => 'Los Talles Disponibles solo admite hasta 200 caracteres.',
			'colour.required' => 'Es necesario ingresar los Colores Disponibles.',
			'colour.max' => 'Los Colores Disponibles solo admite hasta 200 caracteres.',
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
			'waist' => 'required|max:200',
			'colour' => 'required|max:200',
			'price' => 'required|numeric|min:0' ,//No negativos
			'cost_price' => 'required|numeric|min:0', //No negativos
			'providers' => 'required',
			'category_id' => 'required'
		];

		$this->validate($request, $rules, $messages);

    	//Recibimos los datos
    	$product->name = $request->input('name');
    	$product->price = $request->input('price');

        /*=============================================
        =  RECIBIMOS LOS COLORES Y LO CONCATENAMOS    =
        =============================================*/
        $colours="";
        foreach ($request->input('colour') as $colour) {
            $colours .= $colour.'; ';
        }
        //INSERTAMOS LOS COLORES Y LIMPIAMOS EL ULTIMO CARACTER
         $product->colours =rtrim($colours,'; ') ;
        /*===== FIN RECIBIMOS LOS COLORES Y LO CONCATENAMOS   ======*/

        /*=============================================
        =  RECIBIMOS LOS TALLES Y LO CONCATENAMOS    =
        =============================================*/
        $waists="";
        foreach ($request->input('waist') as $waist) {
            $waists .= $waist.'; ';
        }
        //INSERTAMOS LOS TALLES Y LIMPIAMOS EL ULTIMO CARACTER
        $product->waists = rtrim($waists,'; ');
        /*===== FIN RECIBIMOS LOS TALLES Y LO CONCATENAMOS   ======*/

    	$product->description = $request->input('description');
    	$product->long_description = $request->input('long_description');
    	$product->cost_price = $request->input('cost_price');
    	$product->provider_id = $request->input('providers');
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
