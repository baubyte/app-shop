<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'=> ucfirst($faker->word),
        'image'=> $faker->imageUrl(250,250) ,
        'description'=> $faker->sentence(4)
    ];
});
