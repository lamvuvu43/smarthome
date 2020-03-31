<?php

use Illuminate\Database\Seeder;

class his_logSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('his_log')->insert(['id_user'=>'1','log_time' => date('Y-m-d H:i:s'), 'device' => 'led long'],
            ['id_user'=>'2','log_time' => date('Y-m-d H:i:s'), 'device' => 'led color'],
            ['id_user'=>'3','log_time' => date('Y-m-d H:i:s'), 'device' => 'led ball']);
    }
}
