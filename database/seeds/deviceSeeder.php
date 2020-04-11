<?php

use Illuminate\Database\Seeder;

class deviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('device')->insert([['id_devi_type' => '1', 'name_device' => 'đèn dài'],
                ['id_dive_type' => '1', 'name_device' => 'đèn tròn']]
        );
    }
}
