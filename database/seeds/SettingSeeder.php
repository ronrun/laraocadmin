<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE `settings`");

        DB::table('settings')->insert([
            'code' => 'config',
            'key' => 'config_limit_admin',
            'value' => 10,
        ]);

        DB::table('settings')->insert([
            'code' => 'config',
            'key' => 'config_default_image_width',
            'value' => 720,
        ]);

        DB::table('settings')->insert([
            'code' => 'config',
            'key' => 'config_default_image_height',
            'value' => 720,
        ]);

        DB::table('settings')->insert([
            'code' => 'config',
            'key' => 'config_name',
            'value' => 'Lara OCAdmin',
        ]);

        DB::table('settings')->insert([
            'code' => 'config',
            'key' => 'config_email',
            'value' => 'contact@laraocadmin.local',
        ]);

        DB::table('settings')->insert([
            'code' => 'config',
            'key' => 'config_telephone',
            'value' => '+886-2-1234-5678',
        ]);

        DB::table('settings')->insert([
            'code' => 'config',
            'key' => 'config_meta_title',
            'value' => '',
        ]);

        DB::table('settings')->insert([
            'code' => 'config',
            'key' => 'config_meta_description',
            'value' => '',
        ]);

        DB::table('settings')->insert([
            'code' => 'config',
            'key' => 'config_meta_keyword',
            'value' => '',
        ]);

    }
}
