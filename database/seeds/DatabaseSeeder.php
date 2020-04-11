<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(user_permissionSeeder::class);
        $this->call(usersSeeder::class);
        $this->call(his_logSeeder::class);
        $this->call(houseSeeder::class);
        $this->call(floorSeeder::class);
        $this->call(roomSeeder::class);
       $this->call(DeviceTypeSeeder::class);
        $this->call(deviceSeeder::class);
        $this->call(statusSeeder::class);
        $this->call(detail_of_deviceSeeder::class);
        $this->call(create_module_typeSeeder::class);
        $this->call(moduleSeeder::class);
        $this->call(controllerSeeder::class);
    }
}
