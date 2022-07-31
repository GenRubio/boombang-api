<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSceneryIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenery_indicators', function (Blueprint $table) {
            $table->unsignedBigInteger('public_scenery_id');
            $table->unsignedBigInteger('param_scenery_floor_indicator_id');
            $table->unsignedBigInteger('next_scenery_id');
            $table->integer('indicator_position_x');
            $table->integer('indicator_position_y');
            $table->integer('next_scenery_position_x');
            $table->integer('next_scenery_position_y');
            $table->integer('next_scenery_position_z');
            $table->timestamps();

            $table->foreign('public_scenery_id')
                ->references('id')
                ->on('public_sceneries')
                ->cascadeOnDelete();

            $table->foreign('param_scenery_floor_indicator_id')
                ->references('id')
                ->on('parametric_table_values')
                ->cascadeOnDelete();

            $table->foreign('next_scenery_id')
                ->references('id')
                ->on('public_sceneries')
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
        Schema::dropIfExists('scenery_indicators');
    }
}
