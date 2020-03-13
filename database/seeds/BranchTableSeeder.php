<?php

use Illuminate\Database\Seeder;
use App\Branch;
use Carbon\Carbon;
class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::insert([
            'branch_no' => '00000',
            'name_th' => 'บริษัท กรุงเทพโทรทัศน์และวิทยุ จำกัด (ช่อง 7HD)',
            'name_en' => 'Bangkok Broadcasting Television Channel 7',
            'short_name' => 'ช่อง 7HD',
            'tel' => '024957777',
            'fax' => '',
            'email' => '',
            'add_th' => 'เลขที่ 998/1 ซอยร่วมศิริมิตร (พหลโยธิน 18/1) ถ.พหลโยธิน แขวงจอมพล เขตจตุจักร กทม. 10900',
            'add_en' => '998/1 Ruamsirimit (Phahonyothin 18/1), Phahonyothin Road, Chomphon Subdistrict, Chatuchak District, Bangkok 10900',
            'trash' =>0,
            'bu_id' =>1,
            'com_id' =>1,
            'created_at' => Carbon::now(),
        ]);
        Branch::insert([
            'branch_no' => '00001',
            'name_th' => 'บริษัท มีเดีย สตูดิโอ จำกัด',
            'name_en' => 'Media Studio Bussiness',
            'short_name' => 'Media Studio',
            'tel' => '027605799',
            'fax' => '027605700',
            'email' => '',
            'add_th' => 'เลขที่ 998/3 ซอย พหลโยธิน 18/1 แขวง จอมพล เขตจตุจักร กรุงเทพมหานคร 10900',
            'add_en' => '998/3 Ruamsirimit (Phahonyothin 18/1), Phahonyothin Road, Chomphon Subdistrict, Chatuchak District, Bangkok 10900',
            'trash' =>0,
            'bu_id' =>1,
            'com_id' =>1,
            'created_at' => Carbon::now(),
        ]);
        //
    }
}
