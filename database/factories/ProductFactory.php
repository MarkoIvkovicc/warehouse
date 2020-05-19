<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);

    return [
        'name' => $faker->productName,
        'description' => $faker->text(),
        'stock' => rand(0, 2000),
        'price' => rand(100, 10000),
    ];
});
