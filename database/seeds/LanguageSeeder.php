<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE `languages`");

        DB::table('languages')->insert([
            'name' => 'English',
            'code' => 'en-gb',
            'locale' => 'en_GB.UTF-8,en_GB,en-gb,english',
            'image' => 'gb.png',
            'active' => 1,
            'sort_order' => 1,
        ]);

        DB::table('languages')->insert([
            'name' => '正體中文',
            'code' => 'zh-tw',
            'locale' => 'zh_TW.UTF-8,zh_TW,zh-tw,chinese',
            'image' => 'tw.png',
            'active' => 1,
            'sort_order' => 2,
        ]);

        DB::table('languages')->insert([
            'name' => '简体中文',
            'code' => 'zh-cn',
            'locale' => 'zh_CN.UTF-8,zh_CN,zh-cn,chinese',
            'image' => 'tw.png',
            'active' => 1,
            'sort_order' => 3,
        ]);

    }
}
