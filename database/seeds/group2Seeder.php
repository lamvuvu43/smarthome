<?php

use Illuminate\Database\Seeder;

class group2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:table('group2')->insert(['id_gr1'=>'1','name_gr2'=>'noname1'],
        ['id_gr1'=>'1','name_gr2'=>'noname2'],
        ['id_gr1'=>'2','name_gr2'=>'noname3']
        );
    }
}
