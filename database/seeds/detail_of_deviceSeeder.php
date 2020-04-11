<?php

use Illuminate\Database\Seeder;

class detail_of_deviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_of_device')->insert(['mac'=>'1234567890DH','id_dev'=>'1','id_stt'=>'1','name_house'=>'led']);
    }
}
