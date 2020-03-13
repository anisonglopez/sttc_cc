<?php

use Illuminate\Database\Seeder;
use App\Menu;
use Carbon\Carbon;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //Company
        Menu::insert([
            'module_id' => 1,
            'code' => 'company.view',
            'desc' => 'แสดง	บริษัท',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'company.create',
            'desc' => 'สร้าง บริษัท',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'company.edit',
            'desc' => 'แก้ไข บริษัท',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'company.delete',
            'desc' => 'ลบ บริษัท',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Branch
        Menu::insert([
            'module_id' => 1,
            'code' => 'branch.view',
            'desc' => 'แสดง	สาขา',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'branch.create',
            'desc' => 'สร้าง สาขา',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'branch.edit',
            'desc' => 'แก้ไข สาขา',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'branch.delete',
            'desc' => 'ลบ สาขา',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Businessunit
        Menu::insert([
            'module_id' => 1,
            'code' => 'businessunit.view',
            'desc' => 'แสดง	ประเภทธุรกิจ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'businessunit.create',
            'desc' => 'สร้าง ประเภทธุรกิจ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'businessunit.edit',
            'desc' => 'แก้ไข ประเภทธุรกิจ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'businessunit.delete',
            'desc' => 'ลบ ประเภทธุรกิจ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Department
        Menu::insert([
            'module_id' => 1,
            'code' => 'department.view',
            'desc' => 'แสดง	แผนก',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'department.create',
            'desc' => 'สร้าง แผนก',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'department.edit',
            'desc' => 'แก้ไข แผนก',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'department.delete',
            'desc' => 'ลบ แผนก',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Module
        Menu::insert([
            'module_id' => 1,
            'code' => 'module.view',
            'desc' => 'แสดง	โมดูล',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'module.create',
            'desc' => 'สร้าง โมดูล',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'module.edit',
            'desc' => 'แก้ไข โมดูล',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'module.delete',
            'desc' => 'ลบ โมดูล',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Menupermission
        Menu::insert([
            'module_id' => 1,
            'code' => 'menupermission.view',
            'desc' => 'แสดง	เมนู/สิทธิ์การใช้งาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'menupermission.create',
            'desc' => 'สร้าง เมนู/สิทธิ์การใช้งาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'menupermission.edit',
            'desc' => 'แก้ไข เมนู/สิทธิ์การใช้งาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'menupermission.delete',
            'desc' => 'ลบ เมนู/สิทธิ์การใช้งาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //docnumber
        Menu::insert([
            'module_id' => 1,
            'code' => 'docnumber.view',
            'desc' => 'แสดง เลขเอกสาร',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'docnumber.create',
            'desc' => 'สร้าง เลขเอกสาร',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 1,
            'code' => 'docnumber.delete',
            'desc' => 'ลบ เลขเอกสาร',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Materialgroup
        Menu::insert([
            'module_id' => 2,
            'code' => 'materialgroup.view',
            'desc' => 'แสดง ประเภทวัสดุอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'materialgroup.create',
            'desc' => 'สร้าง ประเภทวัสดุอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'materialgroup.edit',
            'desc' => 'แก้ไข ประเภทวัสดุอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'materialgroup.delete',
            'desc' => 'ลบ ประเภทวัสดุอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Material
        Menu::insert([
            'module_id' => 2,
            'code' => 'material.view',
            'desc' => 'แสดง ข้อมูลวัสดุอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'material.create',
            'desc' => 'สร้าง ข้อมูลวัสดุอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'material.edit',
            'desc' => 'แก้ไข ข้อมูลวัสดุอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'material.delete',
            'desc' => 'ลบ ข้อมูลวัสดุอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Unit
        Menu::insert([
            'module_id' => 2,
            'code' => 'unit.view',
            'desc' => 'แสดง หน่วยนับ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'unit.create',
            'desc' => 'สร้าง หน่วยนับ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'unit.edit',
            'desc' => 'แก้ไข หน่วยนับ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'unit.delete',
            'desc' => 'ลบ หน่วยนับ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Location
        Menu::insert([
            'module_id' => 2,
            'code' => 'location.view',
            'desc' => 'แสดง สถานที่',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'location.create',
            'desc' => 'สร้าง สถานที่',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'location.edit',
            'desc' => 'แก้ไข สถานที่',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'location.delete',
            'desc' => 'ลบ สถานที่',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Employee
        Menu::insert([
            'module_id' => 2,
            'code' => 'employee.view',
            'desc' => 'แสดง พนักงาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'employee.create',
            'desc' => 'สร้าง พนักงาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'employee.edit',
            'desc' => 'แก้ไข พนักงาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'employee.delete',
            'desc' => 'ลบ พนักงาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Requester
        Menu::insert([
            'module_id' => 2,
            'code' => 'requester.view',
            'desc' => 'แสดง ผู้แจ้ง',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'requester.create',
            'desc' => 'สร้าง ผู้แจ้ง',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'requester.edit',
            'desc' => 'แก้ไข ผู้แจ้ง',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'requester.delete',
            'desc' => 'ลบ ผู้แจ้ง',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Intype
        Menu::insert([
            'module_id' => 2,
            'code' => 'intype.view',
            'desc' => 'แสดง ประเภทการรับเข้า',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'intype.create',
            'desc' => 'สร้าง ประเภทการรับเข้า',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'intype.edit',
            'desc' => 'แก้ไข ประเภทการรับเข้า',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'intype.delete',
            'desc' => 'ลบ ประเภทการรับเข้า',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Outtype
        Menu::insert([
            'module_id' => 2,
            'code' => 'outtype.view',
            'desc' => 'แสดง ประเภทการจำหน่ายออก',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'outtype.create',
            'desc' => 'สร้าง ประเภทการจำหน่ายออก',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'outtype.edit',
            'desc' => 'แก้ไข ประเภทการจำหน่ายออก',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'outtype.delete',
            'desc' => 'ลบ ประเภทการจำหน่ายออก',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Jobstatus
        Menu::insert([
            'module_id' => 2,
            'code' => 'jobstatus.view',
            'desc' => 'แสดง ประเภทสถานะงาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'jobstatus.create',
            'desc' => 'สร้าง ประเภทสถานะงาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'jobstatus.edit',
            'desc' => 'แก้ไข ประเภทสถานะงาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'jobstatus.delete',
            'desc' => 'ลบ ประเภทสถานะงาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Jobtype
        Menu::insert([
            'module_id' => 2,
            'code' => 'jobtype.view',
            'desc' => 'แสดง ประเภทงาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'jobtype.create',
            'desc' => 'สร้าง ประเภทงาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'jobtype.edit',
            'desc' => 'แก้ไข ประเภทงาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'jobtype.delete',
            'desc' => 'ลบ ประเภทงาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Checkinstatus
        Menu::insert([
            'module_id' => 2,
            'code' => 'checkinstatus.view',
            'desc' => 'แสดง สถานะรับเข้าอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'checkinstatus.create',
            'desc' => 'สร้าง สถานะรับเข้าอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'checkinstatus.edit',
            'desc' => 'แก้ไข สถานะรับเข้าอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'checkinstatus.delete',
            'desc' => 'ลบ สถานะรับเข้าอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Priority
        Menu::insert([
            'module_id' => 2,
            'code' => 'priority.view',
            'desc' => 'แสดง ลำดับความสำคัญ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'priority.create',
            'desc' => 'สร้าง ลำดับความสำคัญ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'priority.edit',
            'desc' => 'แก้ไข ลำดับความสำคัญ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 2,
            'code' => 'priority.delete',
            'desc' => 'ลบ ลำดับความสำคัญ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //User
        Menu::insert([
            'module_id' => 3,
            'code' => 'user.view',
            'desc' => 'แสดง ข้อมูลผู้ใช้งาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 3,
            'code' => 'user.create',
            'desc' => 'สร้าง ข้อมูลผู้ใช้งาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 3,
            'code' => 'user.edit',
            'desc' => 'แก้ไข ข้อมูลผู้ใช้งาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 3,
            'code' => 'user.delete',
            'desc' => 'ลบ ข้อมูลผู้ใช้งาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Role
        Menu::insert([
            'module_id' => 3,
            'code' => 'role.view',
            'desc' => 'แสดง กลุ่มผู้ใช้งานระบบ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 3,
            'code' => 'role.create',
            'desc' => 'สร้าง กลุ่มผู้ใช้งานระบบ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 3,
            'code' => 'role.edit',
            'desc' => 'แก้ไข กลุ่มผู้ใช้งานระบบ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 3,
            'code' => 'role.delete',
            'desc' => 'ลบ กลุ่มผู้ใช้งานระบบ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Joborder
        Menu::insert([
            'module_id' => 4,
            'code' => 'joborder.view',
            'desc' => 'แสดง ใบงาน/แจ้งซ่อม',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 4,
            'code' => 'joborder.create',
            'desc' => 'สร้าง ใบงาน/แจ้งซ่อม',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 4,
            'code' => 'joborder.edit',
            'desc' => 'แก้ไข ใบงาน/แจ้งซ่อม',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 4,
            'code' => 'joborder.delete',
            'desc' => 'ลบ ใบงาน/แจ้งซ่อม',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Receive
        Menu::insert([
            'module_id' => 5,
            'code' => 'receive.view',
            'desc' => 'แสดง ข้อมูลรับเข้าระบบ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 5,
            'code' => 'receive.create',
            'desc' => 'สร้าง ข้อมูลรับเข้าระบบ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 5,
            'code' => 'receive.edit',
            'desc' => 'แก้ไข ข้อมูลรับเข้าระบบ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 5,
            'code' => 'receive.delete',
            'desc' => 'ลบ ข้อมูลรับเข้าระบบ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Retirement
        Menu::insert([
            'module_id' => 6,
            'code' => 'retirement.view',
            'desc' => 'แสดง ข้อมูลจำหน่ายออก',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 6,
            'code' => 'retirement.create',
            'desc' => 'สร้าง ข้อมูลจำหน่ายออก',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 6,
            'code' => 'retirement.edit',
            'desc' => 'แก้ไข ข้อมูลจำหน่ายออก',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 6,
            'code' => 'retirement.delete',
            'desc' => 'ลบ ข้อมูลจำหน่ายออก',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Stock-management
        Menu::insert([
            'module_id' => 7,
            'code' => 'stock-management.view',
            'desc' => 'แสดง ข้อมูลจำหน่ายวัสดุอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 7,
            'code' => 'stock-management.create',
            'desc' => 'สร้าง ข้อมูลจำหน่ายวัสดุอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 7,
            'code' => 'stock-management.edit',
            'desc' => 'แก้ไข ข้อมูลจำหน่ายวัสดุอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Menu::insert([
            'module_id' => 7,
            'code' => 'stock-management.delete',
            'desc' => 'ลบ ข้อมูลจำหน่ายวัสดุอุปกรณ์',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Dashboard
        Menu::insert([
            'module_id' => 8,
            'code' => 'dashboard.view',
            'desc' => 'แสดง แสดง Dashboard/Wallboard',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Log
        Menu::insert([
            'module_id' => 9,
            'code' => 'log.view',
            'desc' => 'แสดง กลุ่มประวัติการใช้งานระบบ',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //Report
        Menu::insert([
            'module_id' => 10,
            'code' => 'report.view',
            'desc' => 'แสดง กลุ่มรายงาน',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    //
    }
}
