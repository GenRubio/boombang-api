<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIslandSceneriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('island_sceneries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('island_type_id');
            $table->unsignedBigInteger('menu_category_id');
            $table->unsignedBigInteger('scenery_model_id');
            $table->string('file_name');
            $table->text('file_path');
            $table->integer('model');
            $table->text('bit_map');
            $table->integer('position_x');
            $table->integer('position_y');
            $table->integer('max_visitors')->default(12);
            $table->integer('price_uppercut')->default(250);
            $table->integer('price_coconut')->default(25);
            $table->timestamps();

            $table->foreign('island_type_id')
                ->references('id')
                ->on('island_types')
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
        Schema::dropIfExists('island_sceneries');
    }
}
