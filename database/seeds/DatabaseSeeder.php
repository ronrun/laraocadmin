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
        $this->call([
            UserSeeder::class,
            MemberSeeder::class,
            LanguageSeeder::class,
            SettingSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            
        ]);
    }
}
