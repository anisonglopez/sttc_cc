<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserInRole;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 100) -> create();
        User::insert([   
            'dep_id' => 1,
            'branch_id' => 1,
            'name' => 'firstname',
            'lname' => 'lastname',
            'email' => 'adminCH7',
            'email_real' =>'admin@ch7.com',
            'status' =>1,
            'email_verified_at' => now(),
            'password' => '$2y$10$D6ujsUtikmk6hVTJEuupT.Cp6GqRs87Ta4d7AINXJOyjmORkxvirK', // p@ssw0rd
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        UserInRole::insert([   
            'user_id' => 1,
            'role_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        User::insert([   
            'dep_id' => 1,
            'branch_id' => 2,
            'name' => 'firstname',
            'lname' => 'lastname',
            'email' => 'adminMS',
            'email_real' =>'admin@Media.com',
            'status' =>1,
            'email_verified_at' => now(),
            'password' => '$2y$10$D6ujsUtikmk6hVTJEuupT.Cp6GqRs87Ta4d7AINXJOyjmORkxvirK', // p@ssw0rd
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        UserInRole::insert([   
            'user_id' => 2,
            'role_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        //
    }
}
