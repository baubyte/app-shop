<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 /**Línea necesaria para Borrado Logico*/
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes; //Implementamos

    /**Registramos la nueva columna */
    protected $dates = ['deleted_at'];

    // $products->category
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
    // $products->provider
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    // $products->images
    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }
    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->images()->where('featured', true)->first();
        if (!$featuredImage)
        {
            $featuredImage = $this->images()->first();
        }
          if ($featuredImage) {
            return $featuredImage->url;
        }
        //default
        return '/images/products/default.png';
    }
  public function getCategoryNameAttribute()
  {
    if ($this->category) {
      return $this->category->name;
    }
    return 'General';
  }
  public function getProviderNameAttribute()
  {
    if ($this->provider) {
      return $this->provider->name;
    }
    return 'Sin Proveedor';
  }
}
