<?php

use Illuminate\Database\Seeder;
use App\Intype;
use Carbon\Carbon;
class IntypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Intype::insert([
            'name' => 'รับจากการสั่งซื้อ',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Intype::insert([
            'name' => 'รับโดยไม่ผ่านการสั่งซื้อ',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    }
}
