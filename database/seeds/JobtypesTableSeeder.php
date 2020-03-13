<?php

use Illuminate\Database\Seeder;
use App\Jobtype;
use Carbon\Carbon;
class JobtypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jobtype::insert([
            'job_no' => 'E',
            'name' => 'ไฟฟ้า',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Jobtype::insert([
            'job_no' => 'W',
            'name' => 'ประปา',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Jobtype::insert([
            'job_no' => 'P',
            'name' => 'โทรศัพท์',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
        Jobtype::insert([
            'job_no' => 'B',
            'name' => 'อาคาร',
            'desc' => '',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    }
}
