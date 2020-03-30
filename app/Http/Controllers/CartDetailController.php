<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CartDetail;


class CartDetailController extends Controller
{
    public function store(Request $request)
    {
        /**Instanciamos la Clase del Modelo */
        $cartDetail = New CartDetail();
        /**ID del Carrito del Usuario */
        $cartDetail->cart_id = auth()->user()->cart->id;//Campo Calculado del ID del Carrito para el usuario solo hay un Carrito activo para cada Usuario
        /**Recibimos los datos del producto y lo asociamos */
        $cartDetail->product_id = $request->product_id;
        $cartDetail->cost_price = $request->cost_price;
        $cartDetail->price = $request->price;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->colours = $request->colour;
        $cartDetail->opcional_colours = $request->colourOptional;
        $cartDetail->waists = $request->waist;
        /**Guardamos la información recibida */
        $cartDetail->save();
        /**Lo llevamos al lugar don el usuario se encontraba */
        flash('¡Bien Hecho! Agregamos Correctamente el Producto a tu Carrito de Compras.')->success()->important();
        return back();

    }
    public function destroy(Request $request)
    {
        /**Buscamos el CartDetail */
        $cartDetail = CartDetail::find($request->cart_detail_id);
        /**Vemos si el cart_detail_id pertenece al usuario */
        if ($cartDetail->cart_id == auth()->user()->cart->id)
        {
            /**Eliminamos el CartDetail encontrado */
            $cartDetail->delete();
        }else{
        /**Lo llevamos al lugar don el usuario se encontraba */
        flash('¡Ups! No pudimos eliminar el Producto de tu Carrito de Compras.')->error()->important();
        return back();
        }
        /**Lo llevamos al lugar don el usuario se encontraba */
        flash('¡Bien Hecho! Eliminamos Correctamente el Producto de tu Carrito de Compras.')->success()->important();
        return back();

    }
}
