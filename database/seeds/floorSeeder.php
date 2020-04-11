<?php

use Illuminate\Database\Seeder;

class floorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('floor')->insert([['id_house'=>'1','name_floor'=>'Tầng 1'],
        ['id_house'=>'1','name_floor'=>'Tầng 2'],
        ['id_house'=>'2','name_floor'=>'Tầng 1']]
        );
    }
}
