<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Warehouse;
use Faker\Generator as Faker;

$factory->define(Warehouse::class, function (Faker $faker) {
    \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);

    return [
        'name' => $faker->department,
        'address' => $faker->address,
        'city' => $faker->city,
        'phone' => $faker->phoneNumber,
    ];
});
