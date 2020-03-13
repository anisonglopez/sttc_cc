<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Log;
use Faker\Generator as Faker;

$factory->define(Log::class, function (Faker $faker) {
    return [
        'action' => $faker->name,
        'module' => $faker->name,
        'user' => $faker->unique()->safeEmail,
        'page' => $faker->name,
        'status' => 'OK', // password
        'desc' => Str::random(10),
        //
    ];
});
