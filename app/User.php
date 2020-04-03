<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**Metodo para la relacion entre el Modelo User y Cart */
    public function carts()
    {
        /**Un Usuario a Muchos Carritos */
        return $this->hasMany(Cart::class);
    }

    /**Metodo para el cart_id del usuario */
    public function getCartAttribute()
    {
        /**Accedemos al Carrito con el Estado Active solo la Primer Coincidencia*/
        $cart = $this->carts()->where('status','Active')->first();
        /**Si tiene un Carrito Activo devolvemos el ID */
        if ($cart) {
            return $cart;
        }else {
            /**Si no tiene ningún Carrito activo lo creamos uno */
            $cart = New Cart();
            $cart->status = 'Active';
            $cart->user_id = $this->id;
            $cart->save();
            return $cart;
        }
        /**Accedemos a todos los Carritos asociados al Usuario
        $this->carts();*/
    }
}
