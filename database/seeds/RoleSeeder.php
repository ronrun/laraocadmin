<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'SA',
            'guard_name' => 'admin',
            'description' => 'System Administrator',
        ]);

        DB::table('roles')->insert([
            'name' => 'SubSA',
            'guard_name' => 'admin',
            'description' => 'Sub System Administrator',
        ]);
    }
}
