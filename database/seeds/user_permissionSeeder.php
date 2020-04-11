<?php

use Illuminate\Database\Seeder;

class user_permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_permission')->insert([['name_per'=>'admin','des_per'=>'quản trị viên'],
            ['name_per'=>'customer','des_per'=>'khách hàng']]);
    }
}
