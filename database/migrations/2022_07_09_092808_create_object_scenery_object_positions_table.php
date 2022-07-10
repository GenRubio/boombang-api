<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectSceneryObjectPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_scenery_object_positions', function (Blueprint $table) {
            $table->unsignedBigInteger('object_id');
            $table->unsignedBigInteger('scenery_object_position_id');
            $table->timestamps();

            $table->foreign('object_id', 'pk_object_positions_object_id')
                ->references('id')
                ->on('objects')
                ->cascadeOnDelete();

            $table->foreign('scenery_object_position_id', 'pk_object_positions_scenery_object_position_id')
                ->references('id')
                ->on('scenery_object_positions')
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
        Schema::dropIfExists('object_scenery_object_positions');
    }
}
