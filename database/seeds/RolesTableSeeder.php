<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\RolePermission;
use Carbon\Carbon;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            'branch_id' => 1,
            'role_name' => 'admin CH7',
            'desc' => '',
            
            'created_at' => Carbon::now(),
        ]);
        Role::insert([
            'branch_id' => 2,
            'role_name' => 'admin Media',
            'desc' => '',
            
            'created_at' => Carbon::now(),
        ]);
        
    //Company
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'company.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'company.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'company.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'company.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Branch
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'branch.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'branch.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'branch.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'branch.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Businessunit
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'businessunit.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'businessunit.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'businessunit.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'businessunit.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Department
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'department.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'department.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'department.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'department.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Module
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'module.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'module.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'module.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'module.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //RolePermissionpermission
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'RolePermissionpermission.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'RolePermissionpermission.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'RolePermissionpermission.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'RolePermissionpermission.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //docnumber
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'docnumber.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'docnumber.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'docnumber.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'docnumber.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Materialgroup
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'materialgroup.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'materialgroup.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'materialgroup.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'materialgroup.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Material
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'material.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'material.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'material.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'material.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Unit
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'unit.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'unit.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'unit.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'unit.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Menupermission
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'menupermission.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'menupermission.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'menupermission.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'menupermission.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Location
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'location.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'location.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'location.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'location.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Employee
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'employee.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'employee.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'employee.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'employee.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Requester
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'requester.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'requester.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'requester.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'requester.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Intype
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'intype.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'intype.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'intype.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'intype.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Outtype
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'outtype.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'outtype.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'outtype.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'outtype.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Jobstatus
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'jobstatus.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'jobstatus.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'jobstatus.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'jobstatus.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Checkinstatus
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'checkinstatus.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'checkinstatus.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'checkinstatus.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'checkinstatus.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Priority
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'priority.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'priority.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'priority.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'priority.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //User
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'user.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'user.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'user.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'user.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Role
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'role.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'role.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'role.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'role.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Joborder
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'joborder.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'joborder.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'joborder.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'joborder.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Receive
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'receive.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'receive.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'receive.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'receive.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Retriement
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'retirement.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'retirement.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'retirement.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'retirement.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Stock-management
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'stock-management.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'stock-management.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'stock-management.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'stock-management.delete',
            
            'created_at' => Carbon::now(),
        ]);
    //Dashboard
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'dashboard.view',
            
            'created_at' => Carbon::now(),
        ]);
    //Log
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'log.view',
            
            'created_at' => Carbon::now(),
        ]);
    //Report
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'report.view',
            
            'created_at' => Carbon::now(),
        ]);
    //jobtype
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'jobtype.view',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'jobtype.create',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'jobtype.edit',
            
            'created_at' => Carbon::now(),
        ]);
        RolePermission::insert([
            'role_id' => 1,
            'code' => 'jobtype.delete',
            
            'created_at' => Carbon::now(),
        ]);
    }
}
