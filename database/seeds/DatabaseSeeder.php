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
        $this->call(PermissionRoleSeeder::class);
        $this->call(SuperAdminSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(SettingSeeder::class);
        //$this->call(UsersTableSeeder::class);
    }
}
