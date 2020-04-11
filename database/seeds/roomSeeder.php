<?php

use Illuminate\Database\Seeder;

class roomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room')->insert([['id_floor' => '1', 'name_room' => 'Phòng khách'],
            ['id_floor' => '2', 'name_room' => 'Phòng ngủ 1'],
            ['id_floor' => '1', 'name_room' => 'Nhà bếp']]);
    }
}
