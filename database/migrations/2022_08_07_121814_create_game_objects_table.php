<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameObjectsTable extends Migration
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
            $table->unsignedBigInteger('param_object_rarity_id');
            $table->unsignedBigInteger('param_object_interaction_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->text('image')->nullable();
            $table->string('file_name')->nullable();
            $table->text('file_path')->nullable();
            $table->string('colors_hex')->nullable();
            $table->string('colors_rgb')->nullable();
            $table->string('size_big')->default("0");
            $table->string('size_medium')->default("1");
            $table->string('size_small')->default("0");
            $table->string('bit_map_size_big')->nullable()->default("");
            $table->string('bit_map_size_medium')->nullable()->default("");
            $table->string('bit_map_size_small')->nullable()->default("");
            $table->string('walk_over_size_big')->default("0");
            $table->string('walk_over_size_medium')->default("0");
            $table->string('walk_over_size_small')->default("0");
            $table->string('undefined_14')->default("-1");
            $table->string('undefined_16')->default("1");
            $table->string('undefined_17')->default("1");
            $table->boolean('show_in_backpack')->default(true);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('param_object_rarity_id')
                ->references('id')
                ->on('parametric_table_values')
                ->cascadeOnDelete();

            $table->foreign('param_object_interaction_id')
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
