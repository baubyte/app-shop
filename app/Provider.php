<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 /**Línea necesaria para Borrado Logico*/
 use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes; //Implementamos

    /**Registramos la nueva columna */
    protected $dates = ['deleted_at'];

    // $provider->products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
