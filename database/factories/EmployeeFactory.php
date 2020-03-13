<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Employee;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'branch_id' => $faker->numberBetween($min=1,$max=2),
        'dep_id' => $faker->numberBetween($min=1,$max=25),
        'emp_code' => $faker->numberBetween($min=1,$max=999),
        'title' => $faker->name,
        'f_name' => $faker->name,
        'l_name' => $faker->name,
        'nickname' => $faker->name,
        'remark' => $faker->name,
        'assign_flg' => $faker->numberBetween($min=0,$max=1),
        'trash' => 0,
    ];
});
