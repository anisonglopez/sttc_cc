<?php

use Illuminate\Database\Seeder;
use App\Department;
use Carbon\Carbon;
class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // factory(App\Department::class, 20) -> create();
        Department::insert([
            'dep_code' => '101000000',
            'name_th' => 'สำนักกรรมการเจ้าหน้าที่บริหาร',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101110000',
            'name_th' => 'ฝ่ายการตลาด',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101130000',
            'name_th' => 'ฝ่ายการเงินและบัญชี',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101150000',
            'name_th' => 'ฝ่ายข่าว',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101151001',
            'name_th' => 'ฝ่ายข่าว 1',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101155001',
            'name_th' => 'ฝ่ายข่าว 2',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101160000',
            'name_th' => 'ฝ่ายธุรการ',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101170000',
            'name_th' => 'ฝ่ายเทคนิคด้านผลิตรายการและออกอากาศ',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101220000',
            'name_th' => 'ฝ่ายทรัพยากรบุคคล',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101230000',
            'name_th' => 'ฝ่ายเซ็นเซอร์โฆษณาและรายการ',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101240000',
            'name_th' => 'ฝ่ายวิศวกรรมวางแผนและเครือข่าย',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101271000',
            'name_th' => 'กลุ่มพิเศษ (กรรมการบริหาร กรรมการผู้จัดการ ผู้ช่วยกรรมการผู้จัดการ ที่ปรึกษา แผนกเลขานุกา',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101320000',
            'name_th' => 'สายงานเลขานุการประธานกรรมการ',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101330000',
            'name_th' => 'สายงานกฏหมายธุรกิจ',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101340000',
            'name_th' => 'ฝ่ายบริหารทรัพยากรสื่อ',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101400000',
            'name_th' => 'ฝ่ายผลิตรายการ',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101410000',
            'name_th' => 'ฝ่ายผลิตรายการละคร',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101420000',
            'name_th' => 'สายงานบริหารสิทธิ์รายการ',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101430000',
            'name_th' => 'สายงานประชาสัมพันธ์รายการ',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101440000',
            'name_th' => 'สายงานวางแผนและบริหารผังรายการ',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101450000',
            'name_th' => 'สายงานระบบสารสนเทศ',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101470000',
            'name_th' => 'ฝ่ายส่งเสริมการผลิตละครและบริหารนักแสดง',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101481300',
            'name_th' => 'สายงานบริหารงานบุคลล',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101510000',
            'name_th' => 'สายงานตรวจสอบรายการ',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101560000',
            'name_th' => 'ฝ่ายสื่อสารองค์กร',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Department::insert([
            'dep_code' => '101990000',
            'name_th' => 'ส่วนกลางบริษัทฯ ( ITBC )',
            'name_en' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);

        //
    }
}
