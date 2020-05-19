<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);

    return [
        'name' => $faker->name,
        'age' => rand($min = 18, $max = 65),
        'job_description' => $faker->text,
        'warehouse_id' => \App\Warehouse::inRandomOrder()->first()->id,
    ];
});
