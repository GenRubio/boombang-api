<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_objects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('object_id');
            $table->unsignedBigInteger('user_island_island_scenery_id')->nullable();
            $table->text('colors_hex')->nullable();
            $table->text('colors_rgb')->nullable();
            $table->integer('rotation')->default(0);
            $table->integer('position_x')->nullable();
            $table->integer('position_y')->nullable();
            $table->text('bit_map_ocupe')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('object_id')
                ->references('id')
                ->on('objects')
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
        Schema::dropIfExists('user_objects');
    }
}
