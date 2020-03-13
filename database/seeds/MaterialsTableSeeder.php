<?php

use Illuminate\Database\Seeder;
use App\Material;
use Carbon\Carbon;
use Faker\Generator as Faker;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::insert([
            'name' => 'Cable Release',
            'desc' => '',
            'branch_id' => 1,
            'm_g_id' => 3,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 10,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => '256 GB. Cinemag II',
            'desc' => '',
            'branch_id' => 1,
            'm_g_id' => 1,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 10,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => 'Single Bay Enclosure USB 3.0, eSATA',
            'desc' => '',
            'branch_id' => 1,
            'm_g_id' => 1,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 10,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => 'Thunderbolt Cable',
            'desc' => '',
            'branch_id' => 1,
            'm_g_id' => 1,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 10,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => 'Light Meter with Case',
            'desc' => '',
            'branch_id' => 1,
            'm_g_id' => 3,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 10,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => '	Joker Bug 400 W. Kit',
            'desc' => '',
            'branch_id' => 1,
            'm_g_id' => 3,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 10,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => 'บันได Platform',
            'desc' => '',
            'branch_id' => 1,
            'm_g_id' => 1,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 10,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => 'Spot Light 150 W.',
            'desc' => '',
            'branch_id' => 1,
            'm_g_id' => 1,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 23,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => '20 m. 32 amp. with C -Form Connector',
            'desc' => '',
            'branch_id' => 1,
            'm_g_id' => 3,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 11,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => 'Battery 12 Volt 200 Amp. with Inverter',
            'desc' => '',
            'branch_id' => 1,
            'm_g_id' => 1,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 10,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => '8 C-Clamp.',
            'desc' => '',
            'branch_id' => 1,
            'm_g_id' => 1,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 10,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => '	Pipe Clamp with D-Ring (คอเสือห่วง)',
            'desc' => '',
            'branch_id' => 1,
            'm_g_id' => 2,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 24,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => 'Gutter Hook',
            'desc' => '',
            'branch_id' => 1,
            'm_g_id' => 1,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 11,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => 'Hydrolic Pump DC. 24 Volt',
            'desc' => '',
            'branch_id' => 1,
            'm_g_id' => 1,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 10,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => 'Quick Link Mini',
            'desc' => '',
            'branch_id' => 1,
            'm_g_id' => 1,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 10,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => 'Round Sling 2 Ton L-3 m. (Yellow)',
            'desc' => '',
            'branch_id' => 2,
            'm_g_id' => 1,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 11,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => 'Wire Rope 6 mm. with Eye L-20 m.',
            'desc' => '',
            'branch_id' => 2,
            'm_g_id' => 1,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 11,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => 'Pipe',
            'desc' => '',
            'branch_id' => 2,
            'm_g_id' => 2,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 10,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => 'Half Coupler with Eye Ring (Stell Half with Ring Pipe Clamp)',
            'desc' => '',
            'branch_id' => 2,
            'm_g_id' => 2,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 10,
            'created_at' => Carbon::now(),
        ]);
        Material::insert([
            'name' => 'Fix Coupler (Fix Pipe Clamp)',
            'desc' => '',
            'branch_id' => 2,
            'm_g_id' => 2,
            'max' => '20',
            'min' => '5',
            'status' => 1,
            'trash' => 0,
            'unit_id' => 10,
            'created_at' => Carbon::now(),
        ]);
    }
}
