<?php

use Illuminate\Database\Seeder;

class moduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module')->insert(['serial'=>'1234567890DH','name_mod'=>'noname_mod','value'=>'1']);
    }
}
