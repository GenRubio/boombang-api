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
        Schema::create('objects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('object_rarity_id');
            $table->unsignedBigInteger('object_interaction_id');
            $table->text('name');
            $table->string('file_name');
            $table->text('file_path');
            $table->text('colors_hex')->nullable();
            $table->text('colors_rgb')->nullable();
            $table->string('size_big')->default("0");
            $table->string('size_medium')->default("1");
            $table->string('size_small')->default("0");
            $table->text('bit_map_size_big')->comment('something_1');
            $table->text('bit_map_size_medium')->comment('something_2');
            $table->text('bit_map_size_small')->comment('something_3');
            $table->string('walk_over_size_big')->default("0")->comment('something_4');
            $table->string('walk_over_size_medium')->default("0")->comment('something_5');
            $table->string('walk_over_size_small')->default("0")->comment('something_6');
            $table->string('undefined_14')->default("-1")->comment('something_14');
            $table->string('undefined_16')->default("1")->comment('something_16');
            $table->string('undefined_17')->default("1")->comment('something_17');
            $table->timestamps();

            $table->foreign('object_rarity_id')
                ->references('id')
                ->on('object_rarities')
                ->cascadeOnDelete();

            $table->foreign('object_interaction_id')
                ->references('id')
                ->on('object_interactions')
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
        Schema::dropIfExists('objects');
    }
}
