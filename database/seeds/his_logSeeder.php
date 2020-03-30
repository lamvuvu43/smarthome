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
        DB::table('his_log')->insert(['log_time' => date('Y-m-d H:i:s'), 'device' => 'led long'],
            ['log_time' => date('Y-m-d H:i:s'), 'device' => 'led color'],
            ['log_time' => date('Y-m-d H:i:s'), 'device' => 'led ball']);
    }
}
