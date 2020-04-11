<?php

use Illuminate\Database\Seeder;

class create_module_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module_type')->insert(['name_mod_type'=>'Công tắc','start_value'=>'0','limit_value'=>'10'],
            ['name_mod_type'=>'Máy đo','start_value'=>'0','limit_value'=>'10'],
            ['name_mod_type'=>'Điều khiển','start_value'=>'0','limit_value'=>'10']);
    }
}
