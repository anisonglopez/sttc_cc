<?php

use Illuminate\Database\Seeder;
use App\Materialgroup;
use Carbon\Carbon;
class MaterialGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materialgroup::insert([
            'name' => 'ไฟฟ้า',
            'desc' => '',
            'material_code' => 'E',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Materialgroup::insert([
            'name' => 'ประปา',
            'desc' => '',
            'material_code' => 'W',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Materialgroup::insert([
            'name' => 'โทรศัพท์',
            'desc' => '',
            'material_code' => 'T',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Materialgroup::insert([
            'name' => 'อาคาร',
            'desc' => '',
            'material_code' => 'B',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    }
}
