<?php

use Illuminate\Database\Seeder;

class controllerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('controller')->insert(['id_mod'=>'1','id_room'=>'1','id_per'=>'1','id_user'=>'1'],
           ['id_mod'=>'1','id_room'=>'2','id_per'=>'2','id_user'=>'2']);
    }
}
