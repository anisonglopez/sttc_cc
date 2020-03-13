<?php

use Illuminate\Database\Seeder;
use App\Module;
use Carbon\Carbon;
class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::insert([
             // id:1
            'module_name' => 'Configuration',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Module::insert([
            // id:2
            'module_name' => 'Master Data',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Module::insert([
             // id:3
            'module_name' => 'User Profile',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Module::insert([
             // id:4
            'module_name' => 'Job Order',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Module::insert([
             // id:5
            'module_name' => 'Recieve',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Module::insert([
             // id:6
            'module_name' => 'Retirement',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Module::insert([
             // id:7
            'module_name' => 'Stock Management',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Module::insert([
             // id:8
            'module_name' => 'Dashboard / Wallboard',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Module::insert([
             // id:9
            'module_name' => 'Logs',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Module::insert([
             // id:10
            'module_name' => 'Report',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
            // // factory(App\Module::class, 100) -> create();
    }
}
