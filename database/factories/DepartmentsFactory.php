<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Department;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {
    return [
        'name_th' => $faker->name,
        'name_en' => $faker->name,
        'trash' => 0,
        //
    ];
});
