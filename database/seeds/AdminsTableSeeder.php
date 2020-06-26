<?php

use Illuminate\Database\Seeder;
use App\Models\Auth\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create('zh_TW');
    	
        DB::statement("TRUNCATE TABLE `admins`");

        Admin::create([
            'username' => 'admin',
            'email' => 'admin@laraocadmin.local',
            'password' => bcrypt('123456'),
            'name' => 'Administrator',
            'mobilephone' => '+886-912-345678',
            'status' => 1,
            ]);
    }
}
