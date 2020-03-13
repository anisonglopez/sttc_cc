<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Requester;

$factory->define(Requester::class, function (Faker $faker) {
    return [
        'branch_id' => $faker->numberBetween($min=1,$max=2),
        'name' => $faker->name,
        'trash' => 0,
    ];
});
