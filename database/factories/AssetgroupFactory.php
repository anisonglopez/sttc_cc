<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Assetgroup;

$factory->define(Assetgroup::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'useful' => $faker->numberBetween($min=0,$max=99),
        'desc' => Str::random(10),
    ];
});
