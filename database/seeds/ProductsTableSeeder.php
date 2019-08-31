<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //Model Factory
       //Creando Productos al Azar y Categorias
       /*factory(Category::class, 7)->create(); 
       factory(Product::class, 20)->create(); 
       factory(ProductImage::class, 40)->create(); */

       $categories = factory(Category::class, 7)->create();
       $categories->each(function ($category){
        $products = factory(Product::class, 20)->make();
        $category->products()->saveMany($products);

        $products->each(function ($p){
          $images= factory(ProductImage::class, 4)->make();
          $p->images()->saveMany($images);
        }); 

       });


       /*$users = factory(App\User::class, 3)
           ->create()
           ->each(function ($user) {
                $user->posts()->save(factory(App\Post::class)->make());
            });*/
    }
}
