<?php

use Illuminate\Database\Seeder;
use App\Priority;
use Carbon\Carbon;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Priority::insert([
            'name' => 'ต่ำ',
            'code' => '1',
            'color_code' => '#00FF00',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Priority::insert([
            'name' => 'ปานกลาง',
            'code' => '2',
            'color_code' => '#FFC300',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Priority::insert([
            'name' => 'ด่วน',
            'code' => '3',
            'color_code' => '#F07d00',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Priority::insert([
            'name' => 'ด่วนที่สุด',
            'code' => '4',
            'color_code' => '#FF0000',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    }
}