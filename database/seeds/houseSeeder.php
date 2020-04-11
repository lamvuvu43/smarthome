<?php

use Illuminate\Database\Seeder;

class houseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('house')->insert([['id_user'=>'1','name_house'=>'noname'],
            ['id_user'=>'2','name_house'=>'noname2'],
            ['id_user'=>'3','name_house'=>'noname3']]
        );
    }
}
