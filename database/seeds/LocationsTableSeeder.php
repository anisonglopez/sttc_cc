<?php

use Illuminate\Database\Seeder;
use App\Location;
use Carbon\Carbon;
class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::insert([
            'name' => 'อาคาร 2 ชั้น 4',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Location::insert([
            'name' => 'อาคาร 1',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Location::insert([
            'name' => 'ธุรการ',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Location::insert([
            'name' => 'อาคาร 2 ชั้น 1',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Location::insert([
            'name' => 'อาคาร 2 ชั้น 2',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Location::insert([
            'name' => 'อาคาร 2 ชั้น 3',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Location::insert([
            'name' => 'สตูดิโอ 1',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Location::insert([
            'name' => 'สตูดิโอ 2',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Location::insert([
            'name' => 'สตูดิโอ 3',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Location::insert([
            'name' => 'ลานจอดรถธุรการ',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    }
}
