<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
   public function index($id)
   {
   		$product = Product::find($id);
   		$images = $product->images()->orderBy('featured', 'desc')->get();
   		return view('admin.products.images.index')->with(compact('product','images'));
   }
   public function store(Request $request, $id)
   {
      //Guardar Archivo de Imagen
      $file = $request->file('photo');
      $path = public_path() . '/images/products';
      $fileName = uniqid() . $file->getClientOriginalName();
      $moved = $file->move($path, $fileName);

      //Insert registro en product_images
      if ($moved)
      {
         $productImage = new ProductImage();
         $productImage->image = $fileName;
         //$productImage->featured =;
         $productImage->product_id = $id;
         $productImage->save();
      }
        /**Generamos un Mensaje */
        flash('¡Bien Hecho! Se Agrego Correctamente la Imagen al Producto.')->success()->important();
      return back();

   }
   public function destroy(Request $request, $id)
   {
   	//Eliminamos la Imagen
      $productImage = ProductImage::find($request->input('image_id'));
      if (substr($productImage->image,0 , 4) === "http")
      {
         $deleted = true;
      }
      else
      {
         $fullPath = public_path() . '/images/products/'.$productImage->image;
         $deleted = File::delete($fullPath);
      }
      //Eliminamos los Datos de la BD
      if ($deleted) {
         $productImage->delete();
      }
        /**Generamos un Mensaje */
        flash('¡Bien Hecho! Se Elimino Correctamente la Imagen del Producto.')->success()->important();
      return back();
   }

   public function select($id, $image)
   {
      //Primero Actualizamos Las Imágenes Actualizadas Anteriormente
      ProductImage::where('product_id', $id)->update([
         'featured'=>false
      ]);
      //Despues descamos la imagen seleccionada
      $productImage = ProductImage::find($image);
      $productImage->featured = true;
      $productImage->save();
        /**Generamos un Mensaje */
        flash('¡Bien Hecho! Se Selecciono Correctamente la Imagen como Destacada.')->success()->important();
      return back();
   }
}
