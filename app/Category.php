<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 /**Línea necesaria para Borrado Logico*/
 use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes; //Implementamos

    /**Registramos la nueva columna */
    protected $dates = ['deleted_at'];

    /**Validaciones y mensajes personalizados*/
    public static $messages = [
        'name.required' => 'Es necesario ingresar una Categoría/Marca.',
        'name.min'      => 'El Nombre de la Categoría debe tener al menos 3 caracteres.',
        'description.max' => 'La descripción solo admite hasta 250 caracteres.',
    ];

    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'max:250',
    ];

    /**Definimos los valores que de pueden tomar para la Asignación Masiva */
    protected $fillable = ['name', 'description'];

    // $category->products
    public function products()
    {
    	return $this->hasMany(Product::class);
    }

}
