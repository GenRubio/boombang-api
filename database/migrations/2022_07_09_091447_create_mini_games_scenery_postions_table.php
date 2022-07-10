<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiniGamesSceneryPostionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mini_games_scenery_postions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mini_games_scenery_id');
            $table->integer('position_x');
            $table->integer('position_y');
            $table->timestamps();

            $table->foreign('mini_games_scenery_id')
                ->references('id')
                ->on('mini_games_sceneries')
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
        Schema::dropIfExists('mini_games_scenery_postions');
    }
}
