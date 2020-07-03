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
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->string('name', 30);
            $table->string('email', 100);
            $table->string('mobilephone',20)->nullable();
            $table->date('date_available')->nullable();
            $table->date('date_expiry')->nullable();
            $table->tinyInteger('active')->default(1);
            
            $table->rememberToken();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `admins` comment 'backend users'");
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
