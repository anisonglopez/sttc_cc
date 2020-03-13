<?php

use Illuminate\Database\Seeder;
use App\Company;
use Carbon\Carbon;
class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::insert([
            'com_no' => 'CH7HD',
            'name_th' => 'บริษัท กรุงเทพโทรทัศน์และวิทยุ จำกัด (ช่อง 7HD)',
            'name_en' => 'Bangkok Broadcasting Television Channel 7',
            'short_name' => 'ช่อง 7HD',
            'tax_id' => '',
            'tel' => '024957777',
            'fax' => '',
            'email' => '',
            'add_th' => 'เลขที่ 998/1 ซอยร่วมศิริมิตร (พหลโยธิน 18/1) ถ.พหลโยธิน แขวงจอมพล เขตจตุจักร กทม. 10900',
            'add_en' => '998/1 Ruamsirimit (Phahonyothin 18/1), Phahonyothin Road, Chomphon Subdistrict, Chatuchak District, Bangkok 10900',
            'trash' =>0,
            'created_at' => Carbon::now(),
        ]);
    }
}
