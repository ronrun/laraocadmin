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
        $faker = Faker\Factory::create('en_GB');

        DB::statement("TRUNCATE TABLE `users`");

        DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'name' => $faker->name,
            'email' => 'admin@laraocadmin.local',
        ]);

        factory(App\Models\Admin\User::class, 50)->create();
    }
}
