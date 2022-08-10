<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_friends', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('friend_id');
            $table->unsignedBigInteger('param_friend_icon_id');
            $table->string('note')->nullable();
            $table->boolean('request_accepted')->default(false);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('friend_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('param_friend_icon_id')
                ->references('id')
                ->on('parametric_table_values')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_friends');
    }
}
