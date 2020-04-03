<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use Mail;

class CartController extends Controller
{
    public function update()
    {
        /**Obtenemos el Carrito del Usuario */
        $client = auth()->user();
    	$cart = $client->cart;
        $cart->status = 'Pending';
        $cart->order_date = Carbon::now();
        /**Guardamos los Cambios */
        $cart->save();
        /**Generamos el Mail */
        $admins = User::where('admin', true)->get();
        Mail::to($admins)->send(new NewOrder($client, $cart));

        /**Generamos un Mensaje y volvemos al lugar donde se encontraba el usuario */
        flash('¡Bien Hecho! Registramos Correctamente Tu Pedido. Te estaremos contactando por mail.')->success()->important();
        return back();
    }
}
