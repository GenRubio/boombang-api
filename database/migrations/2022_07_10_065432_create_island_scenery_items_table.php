<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIslandSceneryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('island_scenery_items', function (Blueprint $table) {
            $table->unsignedBigInteger('island_scenery_id')->nullable();
            $table->unsignedBigInteger('scenery_item_id');
            $table->timestamps();

            $table->foreign('island_scenery_id')
                ->references('id')
                ->on('island_sceneries')
                ->cascadeOnDelete();

            $table->foreign('scenery_item_id')
                ->references('id')
                ->on('scenery_items')
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
        Schema::dropIfExists('island_scenery_items');
    }
}
