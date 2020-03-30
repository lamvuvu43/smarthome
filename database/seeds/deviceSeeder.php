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
        DB::table('device')->insert(['id_type'=>'1','name_device'=>'đèn dài','start_value'=>'1','limit_value'=>'10'],
            ['id_type'=>'1','name_device'=>'đèn tròn','start_value'=>'1','limit_value'=>'10']
            );
    }
}
