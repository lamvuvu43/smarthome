<?php

use Illuminate\Database\Seeder;

class DeviceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('device_type')->insert([['name_devi_type'=>'đèn'],
            ['name_devi_type'=>'quạt'],
            ['name_devi_type'=>'tivi']]);

    }
}
