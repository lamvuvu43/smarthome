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
        DB::table('detail_of_device')->insert(['serial'=>'1234567890DH','id_dev'=>'1','name'=>'led']);
    }
}
