<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE `users`");

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'user@laraocadmin.local',
            'password' => bcrypt('123456'),
        ]);
    }
}
