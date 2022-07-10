<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHomeSceneriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_home_sceneries', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('home_scenery_id');
            $table->string('name');
            $table->text('colors_hex');
            $table->text('colors_rgb');
            $table->text('land_something_1');
            $table->text('land_something_2');
            $table->text('land_something_3');
            $table->text('land_config');
            $table->text('land_colors_hex');
            $table->text('land_colors_rgb');
            $table->text('object_something_1');
            $table->text('object_something_2');
            $table->text('object_something_3');
            $table->text('object_config');
            $table->text('object_colors_hex');
            $table->text('object_colors_rgb');
            $table->boolean('open_door_1')->default(false);
            $table->boolean('open_door_2')->default(false);
            $table->boolean('open_door_3')->default(false);
            $table->boolean('open_door_4')->default(false);
            $table->boolean('open_door_5')->default(false);
            $table->boolean('open_door_6')->default(false);
            $table->boolean('open_door_7')->default(false);
            $table->boolean('open_door_8')->default(false);
            $table->boolean('open_door_9')->default(false);
            $table->boolean('open_door_10')->default(false);
            $table->boolean('open_door_11')->default(false);
            $table->boolean('open_door_12')->default(false);
            $table->boolean('open_door_13')->default(false);
            $table->boolean('open_door_14')->default(false);
            $table->boolean('open_door_15')->default(false);
            $table->boolean('open_door_16')->default(false);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('home_scenery_id')
                ->references('id')
                ->on('home_sceneries')
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
        Schema::dropIfExists('user_home_sceneries');
    }
}
