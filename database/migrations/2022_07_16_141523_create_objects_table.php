<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_objects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('object_rarity_id');
            $table->unsignedBigInteger('object_interaction_id');
            $table->text('name');
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->string('file_name')->nullable();
            $table->text('file_path')->nullable();
            $table->text('colors_hex')->nullable();
            $table->text('colors_rgb')->nullable();
            $table->string('size_big')->nullable();
            $table->string('size_medium')->nullable();
            $table->string('size_small')->nullable();
            $table->text('bit_map_size_big')->nullable();
            $table->text('bit_map_size_medium')->nullable();
            $table->text('bit_map_size_small')->nullable();
            $table->string('walk_over_size_big')->nullable();
            $table->string('walk_over_size_medium')->nullable();
            $table->string('walk_over_size_small')->nullable();
            $table->string('undefined_14')->nullable();
            $table->string('undefined_16')->nullable();
            $table->string('undefined_17')->nullable();
            $table->timestamps();


            $table->foreign('object_rarity_id')
                ->references('id')
                ->on('parametric_table_values')
                ->cascadeOnDelete();

            $table->foreign('object_interaction_id')
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
        Schema::dropIfExists('game_objects');
    }
}
