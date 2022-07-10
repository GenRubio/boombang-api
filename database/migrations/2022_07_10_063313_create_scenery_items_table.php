<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSceneryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenery_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('object_id')->nullable();
            $table->unsignedBigInteger('scenery_item_appearance_id');
            $table->unsignedBigInteger('scenery_item_capture_id');
            $table->text('name');
            $table->text('image')->nullable();
            $table->integer('model');
            $table->integer('appearance_time')->default(1);
            $table->boolean('throw_in_all_public_sceneries')->default(true);
            $table->boolean('throw_in_all_games_sceneries')->default(true);
            $table->boolean('throw_in_all_island_sceneries')->default(true);
            $table->boolean('throw_in_all_home_sceneries')->default(true);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('object_id')
                ->references('id')
                ->on('objects')
                ->cascadeOnDelete();

            $table->foreign('scenery_item_appearance_id')
                ->references('id')
                ->on('scenery_item_appearances')
                ->cascadeOnDelete();

            $table->foreign('scenery_item_capture_id')
                ->references('id')
                ->on('scenery_item_captures')
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
        Schema::dropIfExists('scenery_items');
    }
}
