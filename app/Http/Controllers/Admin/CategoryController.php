<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('name')->paginate(10);
    	return view('admin.categories.index')->with(compact('categories')); //Listado de las Categorias
    }
        public function create()
    {
    	return view('admin.categories.create'); //Formulario de Alta de las Categorias
    }
        public function store(Request $request)
    {
    	//Guardar el Alta de Las Categorias
    	//dd($request->all());
        $this->validate($request, Category::$rules, Category::$messages);

        /**Usamos la Manera de Asignación Masiva (Mass Assignment) */
        Category::create($request->all());

        /**Generamos un Mensaje */
        flash('¡Bien Hecho! Se Agrego Correctamente la Categoría/Marca.')->success()->important();
        /**Volvemos al Listado de Categorias */
    	return redirect('admin/categories/');
    }
 		public function edit(Category $category)
    {
    	return view('admin.categories.edit')->with(compact('category')); //Formulario de Edición de las Categorias
    }

    public function update(Request $request,Category $category)//Forma de conversion asi Laravel ejecuta el Find Automáticamente
    {

        $this->validate($request, Category::$rules, Category::$messages);

        /**Usamos la Manera de Asignación Masiva (Mass Assignment) */
        $category->update($request->all());

        /**Generamos un Mensaje */
        flash('¡Bien Hecho! Se Edito Correctamente la Categoría/Marca.')->success()->important();
        /**Volvemos al Listado de Categorias */
        return redirect('admin/categories/');
    }
        public function destroy(Category $category)//Forma de conversion asi Laravel ejecuta el Find Automáticamente
    {
    	$category->delete();//Eliminamos los Datos en la Base

    	return back();
    }
}
