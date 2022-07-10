<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiniGamesLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mini_games_levels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mini_game_id');
            $table->integer('min_points');
            $table->integer('max_points')->nullable();
            $table->integer('finish_level_points')->nullable();
            $table->integer('level');
            $table->timestamps();

            $table->foreign('mini_game_id')
                ->references('id')
                ->on('mini_games')
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
        Schema::dropIfExists('mini_games_levels');
    }
}
