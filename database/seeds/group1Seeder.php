<?php

use Illuminate\Database\Seeder;

class group1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group1')->insert(['id_user'=>'1','name_gr1'=>'noname'],
            ['id_user'=>'2','name_gr1'=>'noname2'],
            ['id_user'=>'3','name_gr1'=>'noname3']
        );
    }
}
