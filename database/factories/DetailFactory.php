<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Detail;
use Faker\Generator as Faker;

$factory->define(Detail::class, function (Faker $faker) {
    return [
        'name'=>$faker->unique()->name,
        'email'=>$faker->unique()->safeEmail,
        'pinCode'=>$faker->unique()->randomNumber(6),
    ];
});
