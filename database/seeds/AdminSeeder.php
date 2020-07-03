<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE `admins`");

        DB::table('admins')->insert([
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'name' => Str::random(10),
            'email' => 'admin@laraocadmin.local',
        ]);
    }
}
