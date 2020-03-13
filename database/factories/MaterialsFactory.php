<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Material;

$factory->define(Material::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'branch_id' => $faker->numberBetween($min=1,$max=2),
        'm_g_id' => $faker->numberBetween($min=1,$max=3),
        'max' => $faker->numberBetween($min=20,$max=100),
        'min' => $faker->numberBetween($min=0,$max=20),
        'unit_id' => $faker->numberBetween($min=1,$max=24),
        'status' => $faker->numberBetween($min=0,$max=1),
        'desc' => Str::random(10),
    ];
});
