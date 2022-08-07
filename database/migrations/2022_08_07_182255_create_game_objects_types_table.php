<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameObjectsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_objects_types', function (Blueprint $table) {
            $table->unsignedBigInteger('game_object_id');
            $table->unsignedBigInteger('param_scenery_object_type_id');

            $table->foreign('game_object_id')
                ->references('id')
                ->on('game_objects')
                ->cascadeOnDelete();

            $table->foreign('param_scenery_object_type_id')
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
        Schema::dropIfExists('game_objects_types');
    }
}
