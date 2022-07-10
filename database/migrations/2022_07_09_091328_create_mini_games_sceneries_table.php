<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiniGamesSceneriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mini_games_sceneries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mini_game_id');
            $table->unsignedBigInteger('menu_category_id');
            $table->unsignedBigInteger('scenery_model_id');
            $table->text('name');
            $table->string('file_name');
            $table->text('file_path');
            $table->integer('model');
            $table->text('bit_map');
            $table->timestamps();

            $table->foreign('mini_game_id')
                ->references('id')
                ->on('mini_games')
                ->cascadeOnDelete();

            $table->foreign('menu_category_id')
                ->references('id')
                ->on('menu_categories')
                ->cascadeOnDelete();

            $table->foreign('scenery_model_id')
                ->references('id')
                ->on('scenery_models')
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
        Schema::dropIfExists('mini_games_sceneries');
    }
}
