<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Assetmodel;

$factory->define(Assetmodel::class, function (Faker $faker) {
    return [
        'asset_m_no' => $faker->numberBetween($min=0,$max=99),
        'a_g_id' =>$faker->numberBetween($min=0,$max=99),
        'name_th' => $faker->name,
        'name_en' => $faker->name,
        'desc' => Str::random(10),
    ];
});
