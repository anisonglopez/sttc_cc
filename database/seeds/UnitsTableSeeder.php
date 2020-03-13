<?php

use Illuminate\Database\Seeder;
use App\Unit;
use Carbon\Carbon;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::insert([
            'name_th' => 'ถุง',
            'name_en' => 'Bag',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'ใบ',
            'name_en' => 'Blade',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'เล่ม',
            'name_en' => 'Book',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'ขวด',
            'name_en' => 'Bottle',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'กล่อง',
            'name_en' => 'Box',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'กระป๋อง',
            'name_en' => 'Can',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'ซอง',
            'name_en' => 'Envelope',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'ฟุต',
            'name_en' => 'Foot',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'แกลลอน',
            'name_en' => 'Gallon',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'อัน',
            'name_en' => 'Item',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'เส้น',
            'name_en' => 'Line',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'ลิตร',
            'name_en' => 'Liter',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'ก้อน',
            'name_en' => 'Lump',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'เมตร',
            'name_en' => 'Mert',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'แพ็ค',
            'name_en' => 'Pack',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'ห่อ',
            'name_en' => 'Package',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'ผืน',
            'name_en' => 'Piece',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'แท่ง',
            'name_en' => 'Rods',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'ม้วน',
            'name_en' => 'Roll',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'ชุด',
            'name_en' => 'Set',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'แผ่น',
            'name_en' => 'Sheet',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'ถัง',
            'name_en' => 'Tank',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'หลอด',
            'name_en' => 'Tube',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Unit::insert([
            'name_th' => 'หน่วย',
            'name_en' => 'Unit',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    }
}
