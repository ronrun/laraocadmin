<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 100)->comment('帳號')->unique();
            $table->string('password');
            $table->string('name', 30);
            $table->string('email', 100);
            $table->string('mobilephone',20)->comment('手機號碼')->nullable();
            $table->tinyInteger('status')->comment('狀態')->default(1);
            
            $table->rememberToken();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `admins` comment '管理人員基本資料'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
