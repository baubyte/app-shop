<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use File;

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
            $category = Category::create($request->only('name','description'));
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = public_path() . '/images/categories';
                $fileName = uniqid() . $file->getClientOriginalName();
                $moved = $file->move($path, $fileName);

                //Update Category Image
                if ($moved)
                {
                   $category->image = $fileName;
                   $category->save();
                }
            }

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
        $category->update($request->only('name','description'));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            //Update Category Image
            if ($moved)
            {
                /**Tomamos los Datos de la Imagen Anterior */
                $previousPath = $path .'/'. $category->image;
                /**Actualizamos Con la Nueva Imagen */
                $category->image = $fileName;
                $saved = $category->save();
                /**Eliminamos la Imagen Anterior si se Guardo los Cambios */
                if ($saved) {
                    File::delete($previousPath);
                }
            }
        }

        /**Generamos un Mensaje */
        flash('¡Bien Hecho! Se Edito Correctamente la Categoría/Marca.')->success()->important();
        /**Volvemos al Listado de Categorias */
        return redirect('admin/categories/');
    }
        public function destroy(Category $category)//Forma de conversion asi Laravel ejecuta el Find Automáticamente
    {
    	$category->delete();//Eliminamos los Datos en la Base
        /**Generamos un Mensaje */
        flash('¡Bien Hecho! Se Edito Correctamente la Categoría/Marca.')->success()->important();
    	return back();
    }
}
