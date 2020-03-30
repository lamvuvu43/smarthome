<?php

use Illuminate\Database\Seeder;

class type_of_deviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_device')->insert(['name_type'=>'đèn'],
            ['name_type'=>'quạt'],
            ['name_type'=>'tivi']);
    }
}
