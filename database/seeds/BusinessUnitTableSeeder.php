<?php

use Illuminate\Database\Seeder;
use App\Businessunit;
use Carbon\Carbon;
class BusinessUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Businessunit::insert([
            'bu_no' => 'BU001',
            'name' => 'สถานีโทรทัศน์ภาคพื้นดินระบบดิจิทัลในประเทศไทย',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        
        //
    }
}
