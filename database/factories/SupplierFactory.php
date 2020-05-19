<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);

    return [
        'name' => $faker->department,
        'address' => $faker->address,
        'city' => $faker->city,
        'phone' => $faker->phoneNumber,
    ];
});
