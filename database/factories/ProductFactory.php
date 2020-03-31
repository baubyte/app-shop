<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [

            'name'=> $faker->randomNumber(5),
            'description'=> $faker->sentence(10),
            'waists'=> $faker->sentence(5),
            'colours'=> $faker->sentence(6),
            'long_description'=> $faker->text,
            'price'=> $faker->randomFloat(2, 100, 2000),
            'cost_price'=> $faker->randomFloat(2, 50, 1000),
            'providers_id'=> $faker->numberBetween(1,7),
            'category_id'=> $faker->numberBetween(1,7)

    ];
});
