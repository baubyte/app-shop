<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
        /**Obtenemos el Carrito del Usuario */
        $cart = auth()->user()->cart;
        $cart->status = 'Pending';
        /**Guardamos los Cambios */
        $cart->save();
        /**Generamos un Mensaje y volvemos al lugar donde se encontraba el usuario */
        flash('¡Bien Hecho! Registramos Correctamente Tu Pedido. Te estaremos contactando por mail.')->success()->important();
        return back();
    }
}
