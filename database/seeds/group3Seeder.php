<?php

use Illuminate\Database\Seeder;

class group3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group3')->insert(['id_gr2' => '1', 'name_gr2' => 'noname1'],
            ['id_gr2' => '2', 'name_gr2' => 'noname1'],
            ['id_gr2' => '1', 'name_gr2' => 'noname1']);
    }
}
