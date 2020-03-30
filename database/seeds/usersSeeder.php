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
        DB::table('users')->insert(['username'=>'lamvu','password'=>bcrypt('12345678'),'phone'=>'0374885769','email'=>'lamvuvu43@gmail.com','first_name'=>'lam','last_name'=>'vu','address'=>'biên hoà'],
            ['username'=>'lamvu1','password'=>bcrypt('12345678'),'phone'=>'0374885770','email'=>'lamvuvu44@gmail.com','first_name'=>'lam','last_name'=>'vu','address'=>'biên hoà'],
            ['username'=>'lamvu2','password'=>bcrypt('12345678'),'phone'=>'0374885771','email'=>'lamvuvu45@gmail.com','first_name'=>'lam','last_name'=>'vu','address'=>'biên hoà']);
    }
}
