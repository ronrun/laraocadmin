<?php

use Illuminate\Database\Seeder;
use App\Models\Localisation\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE `languages`");

        Language::create([
            'name' => 'English',
            'code' => 'en-gb',
            'locale' => 'en_US.UTF-8,en_US,en-gb,english',
            'image' => 'gb.png',
            'status' => 1,
            'sort_order' => 1,
            ]);

        Language::create([
            'name' => '正體中文',
            'code' => 'zh-tw',
            'locale' => 'zh_TW.UTF-8,zh_TW,chinese',
            'image' => 'tw.png',
            'status' => 1,
            'sort_order' => 2,
            ]);

        Language::create([
            'name' => '简体中文',
            'code' => 'zh-cn',
            'locale' => 'zh_CN.UTF-8,zh_CN,chinese',
            'image' => 'tw.png',
            'status' => 1,
            'sort_order' => 3,
            ]);
    }
}
