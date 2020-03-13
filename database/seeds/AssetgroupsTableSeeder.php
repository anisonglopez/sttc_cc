<?php

use Illuminate\Database\Seeder;
use App\Assetgroup;
use Carbon\Carbon;

class AssetgroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Assetgroup::insert([
            'branch_id' => '1',
            'name' => 'อาคารถาวร',
            'useful' => '25',
            'depreciation_rate' => '4',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Assetgroup::insert([
            'branch_id' => '1',
            'name' => 'อาคารชั่วคราว/โรงเรือน',
            'useful' => '10',
            'depreciation_rate' => '10',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Assetgroup::insert([
            'branch_id' => '1',
            'name' => 'สิ่งก่อนสร้างใช้คอรกรีตเสริมเหล็กหรือโครงเหล็กเป็นส่วนประกอบ',
            'useful' => '15',
            'depreciation_rate' => '6.5',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Assetgroup::insert([
            'branch_id' => '1',
            'name' => 'สิ่งก่อนสร้างใช้ไม้หรือวัสดุอื่น ๆ เป็นส่วนประกอบหลัก',
            'useful' => '8',
            'depreciation_rate' => '12.50',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Assetgroup::insert([
            'branch_id' => '1',
            'name' => 'ครุภัณฑ์สำนักงาน',
            'useful' => '10',
            'depreciation_rate' => '10',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Assetgroup::insert([
            'branch_id' => '1',
            'name' => 'ครุภัณฑ์ยานพาหนะและขนส่ง',
            'useful' => '5',
            'depreciation_rate' => '20',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Assetgroup::insert([
            'branch_id' => '1',
            'name' => 'ครุภัณฑ์ไฟฟ้าและวิทยุ (ยกเว้นเครื่องกำเนิดไฟฟ้าให้มีอายุการใช้งาน 15-20 ปี)',
            'useful' => '5',
            'depreciation_rate' => '20',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Assetgroup::insert([
            'branch_id' => '1',
            'name' => 'ครุภัณฑ์โฆษณาและเผยแพร่',
            'useful' => '5',
            'depreciation_rate' => '20',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Assetgroup::insert([
            'branch_id' => '1',
            'name' => 'ครุภัณฑ์การเกษตร เครื่องจักรกล',
            'useful' => '5',
            'depreciation_rate' => '20',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Assetgroup::insert([
            'branch_id' => '1',
            'name' => 'ครุภัณฑ์โรงงาน เครื่องมือและอุปกรณ์',
            'useful' => '2',
            'depreciation_rate' => '50',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Assetgroup::insert([
            'branch_id' => '1',
            'name' => 'ครุภัณฑ์ก่อสร้าง เครื่องมือและอุปกรณ์',
            'useful' => '2',
            'depreciation_rate' => '50',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Assetgroup::insert([
            'branch_id' => '1',
            'name' => 'ครุภัณฑ์สำรวจ',
            'useful' => '8',
            'depreciation_rate' => '6.5',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Assetgroup::insert([
            'branch_id' => '1',
            'name' => 'ครุภัณฑ์คอมพิวเตอร์',
            'useful' => '2',
            'depreciation_rate' => '50',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Assetgroup::insert([
            'branch_id' => '1',
            'name' => 'ครุภัณฑ์งานบ้านงานครัว',
            'useful' => '2',
            'depreciation_rate' => '50',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        
    }
}
