<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('avatar_id');
            $table->string('avatar_colors_hex');
            $table->string('description')->nullable();
            $table->integer('kisses_sent')->default(0);
            $table->integer('kisses_received')->default(0);
            $table->integer('juices_sent')->default(0);
            $table->integer('juices_received')->default(0);
            $table->integer('flowers_sent')->default(0);
            $table->integer('flores_recibidas')->default(0);
            $table->integer('uppers_sent')->default(0);
            $table->integer('uppers_received')->default(0);
            $table->integer('coconuts_sent')->default(0);
            $table->integer('coconuts_received')->default(0);
            $table->string('hobby_1')->nullable();
            $table->string('hobby_2')->nullable();
            $table->string('hobby_3')->nullable();
            $table->string('wish_1')->nullable();
            $table->string('wish_2')->nullable();
            $table->string('wish_3')->nullable();
            $table->integer('votes_legal')->default(50);
            $table->integer('votes_sexy')->default(50);
            $table->integer('votes_nice')->default(50);
            $table->integer('points_ring')->default(0);
            $table->integer('points_crazy_coconuts')->default(0);
            $table->integer('points_hidden_path')->default(0);
            $table->integer('points_ninja_way')->default(0);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('avatar_id')
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
        Schema::dropIfExists('data_users');
    }
}
