<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('en_GB');

        DB::statement("TRUNCATE TABLE `members`");

        DB::table('members')->insert([
            'name' => $faker->name,
            'email' => 'user@laraocadmin.local',
            'password' => bcrypt('123456'),
        ]);
    }
}
