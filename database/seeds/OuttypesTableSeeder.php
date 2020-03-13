<?php

use Illuminate\Database\Seeder;
use App\Outtype;
use Carbon\Carbon;
class OuttypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Outtype::insert([
            'name' => 'ตัดจำหน่าย',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Outtype::insert([
            'name' => 'ตัดสต๊อก',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    }
}
