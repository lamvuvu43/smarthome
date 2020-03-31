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
        $this->call(group1Seeder::class);
        $this->call(group2Seeder::class);
        $this->call(group3Seeder::class);
        $this->call(type_of_deviceSeeder::class);
        $this->call(deviceSeeder::class);
        $this->call(detail_of_deviceSeeder::class);
        $this->call(moduleSeeder::class);
        $this->call(controllerSeeder::class);
    }
}
