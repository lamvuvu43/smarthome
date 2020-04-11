<?php

use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([['first_name'=>'Vu','last_name'=>'Lâm','password'=>bcrypt('12345678'),'phone'=>'0374885769','email'=>'lamvuvu43@gmail.com','address'=>'biên hoà'],
            ['first_name'=>'Vu1','last_name'=>'Lâm1','password'=>bcrypt('12345678'),'phone'=>'0374885770','email'=>'lamvuvu44@gmail.com','address'=>'biên hoà'],
            ['first_name'=>'Vu2','last_name'=>'Lâm1','password'=>bcrypt('12345678'),'phone'=>'0374885771','email'=>'lamvuvu45@gmail.com','address'=>'biên hoà']]);
    }
}
