<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Arrival;
use Faker\Generator as Faker;

$factory->define(Arrival::class, function (Faker $faker) {
    \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);

    return array(
        'arrival_date' => arrivalDate(2016, 2019),
        'expire_date' => expireDate(2020, 2024),
        'arrival_stock' => rand(50, 2000),
        'supplier_id' => \App\Supplier::inRandomOrder()->first()->id,
        'product_id' => \App\Product::inRandomOrder()->first()->id,
        'employee_id' => \App\Employee::inRandomOrder()->first()->id,
        'warehouse_id' => \App\Warehouse::inRandomOrder()->first()->id,
    );
});

function arrivalDate($min, $max){
    $A_year = rand($min, $max);
    $A_month = rand(1, 12);
    $A_day = rand(1, 28);

    return \Carbon\Carbon::create($A_year, $A_month, $A_day);
}

function expireDate($min, $max){
    $E_year = rand($min, $max);
    $E_month = rand(1, 12);
    $E_day = rand(1, 28);

    return \Carbon\Carbon::create($E_year, $E_month, $E_day);
}
