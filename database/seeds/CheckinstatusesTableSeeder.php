<?php

use Illuminate\Database\Seeder;
use App\Checkinstatus;
use Carbon\Carbon;

class CheckinstatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Checkinstatus::insert([
            'name' => 'สมบูรณ์',
            'operator' => '+1',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Checkinstatus::insert([
            'name' => 'ชำรุด',
            'operator' => '+1',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Checkinstatus::insert([
            'name' => 'สูญหาย',
            'operator' => '-1',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Checkinstatus::insert([
            'name' => 'ซาก',
            'operator' => '+1',
            'desc' => 'รับซาก',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    }
}
