<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('default_locale')->default('es');
            $table->string('security_code')->nullable();
            $table->integer('user_age')->nullable();
            $table->integer('coins_gold')->default(0);
            $table->integer('coins_silver')->default(0);
            $table->integer('admin')->default(0);
            $table->dateTime('vip')->nullable();
            $table->string('register_ip')->nullable();
            $table->string('current_ip')->nullable();
            $table->dateTime('last_connection_date')->nullable();
            $table->boolean('active')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
