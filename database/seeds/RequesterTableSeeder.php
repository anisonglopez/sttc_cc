<?php

use Illuminate\Database\Seeder;

class RequesterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Requester::class,50)->create();
    }
}
