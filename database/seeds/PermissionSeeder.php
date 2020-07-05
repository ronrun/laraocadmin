<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin_system',
            'guard_name' => 'admin',
            'description' => 'admin_system',
        ]);

        DB::table('roles')->insert([
            'name' => 'admin_system_user',
            'guard_name' => 'admin',
            'description' => 'admin_system_user',
        ]);

        DB::table('roles')->insert([
            'name' => 'admin_system_user_users',
            'guard_name' => 'admin',
            'description' => 'admin_system_user_users',
        ]);

        DB::table('roles')->insert([
            'name' => 'admin_system_user_roles',
            'guard_name' => 'admin',
            'description' => 'admin_system_user_roles',
        ]);

        DB::table('roles')->insert([
            'name' => 'admin_system_user_permissions',
            'guard_name' => 'admin',
            'description' => 'admin_system_user_permissions',
        ]);
    }
}
