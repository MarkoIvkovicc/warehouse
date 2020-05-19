<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);

    return [
        'name' => $faker->department,
        'description' => $faker->paragraph,
    ];
});
