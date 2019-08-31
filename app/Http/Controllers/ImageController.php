<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
   public function index($id)
   {
   		$product = Product::find($id);
   		$images = $product->images;
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
      return back();
   }
   public function select($d, $image)
   {
      //Primero Actualizamos Las Imagenaes Actualizadas Anteriormente
      ProductImage::where('product_id', $id)->update([
         'featured'=>false
      ]);
      //Despues descamos la imagen seleccionada
      $ProductImage = ProductImage::find($image);
      $ProductImage->featured = true;
      $productImage->save();

      return back();
   }
}
