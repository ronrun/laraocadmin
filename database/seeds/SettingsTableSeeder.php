<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker\Factory::create('zh_TW');

    DB::statement("TRUNCATE TABLE `settings`");

    Setting::create([
      'code' => 'config',
      'key' => 'config_limit_admin',
      'value' => 20,
      ]);

    Setting::create([
      'code' => 'config',
      'key' => 'config_default_image_width',
      'value' => 720,
      ]);

    Setting::create([
      'code' => 'config',
      'key' => 'config_default_image_height',
      'value' => 720,
      ]);

    Setting::create([
      'code' => 'config',
      'key' => 'config_name',
      'value' => 'Lara OCAdmin',
      ]);

    Setting::create([
      'code' => 'config',
      'key' => 'config_email',
      'value' => 'contact@none.com',
      ]);

    Setting::create([
      'code' => 'config',
      'key' => 'config_telephone',
      'value' => '+886-2-1234-5678',
      ]);

    Setting::create([
      'code' => 'config',
      'key' => 'config_meta_title',
      'value' => '',
      ]);

    Setting::create([
      'code' => 'config',
      'key' => 'config_meta_description',
      'value' => '',
      ]);

    Setting::create([
      'code' => 'config',
      'key' => 'config_meta_keyword',
      'value' => '',
      ]);

  }
}
