<?php

use Illuminate\Database\Seeder;

class statusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([['name_stt' => 'on'], ['name_stt' => 'off']]);
    }
}
