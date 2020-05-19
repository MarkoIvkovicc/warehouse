<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker, $user) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => password_hash('adminadmin', PASSWORD_DEFAULT),
        'created_at' => createdAtDate(2016, 2020),
    ];
});

function createdAtDate($min, $max){
    $A_year = rand($min, $max);
    $A_month = rand(1, 12);
    $A_day = rand(1, 28);

    return \Carbon\Carbon::create($A_year, $A_month, $A_day);
}
