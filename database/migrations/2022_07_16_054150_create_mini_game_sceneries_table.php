<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiniGameSceneriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mini_game_sceneries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scenery_id');
            $table->unsignedBigInteger('mini_game_id');
            $table->unsignedBigInteger('menu_category_id');
            $table->unsignedBigInteger('scenery_model_id');
            $table->timestamps();

            $table->foreign('scenery_id')
                ->references('id')
                ->on('sceneries')
                ->cascadeOnDelete();

            $table->foreign('mini_game_id')
                ->references('id')
                ->on('parametric_table_values')
                ->cascadeOnDelete();

            $table->foreign('menu_category_id')
                ->references('id')
                ->on('parametric_table_values')
                ->cascadeOnDelete();

            $table->foreign('scenery_model_id')
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
        Schema::dropIfExists('mini_game_sceneries');
    }
}
