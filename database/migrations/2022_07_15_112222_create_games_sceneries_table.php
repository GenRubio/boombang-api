<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesSceneriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_sceneries', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->default(0)->nullable();
            $table->unsignedBigInteger('scenery_id');
            $table->unsignedBigInteger('menu_category_id');
            $table->unsignedBigInteger('scenery_model_id');
            $table->text('name');
            $table->integer('position_x')->default(11);
            $table->integer('position_y')->default(11);
            $table->integer('max_visitors')->default(12);
            $table->integer('price_uppercut')->default(250);
            $table->integer('price_coconut')->default(25);
            $table->integer('lft')->default(0);
            $table->integer('rgt')->default(0);
            $table->integer('depth')->default(0);
            $table->boolean('visible')->default(true);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('scenery_id')
                ->references('id')
                ->on('sceneries')
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
        Schema::dropIfExists('game_sceneries');
    }
}
