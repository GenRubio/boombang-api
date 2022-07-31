<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicSceneryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_scenery_items', function (Blueprint $table) {
            $table->unsignedBigInteger('public_scenery_id');
            $table->unsignedBigInteger('item_id');
            $table->timestamps();

            $table->foreign('public_scenery_id')
                ->references('id')
                ->on('public_sceneries')
                ->cascadeOnDelete();

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
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
        Schema::dropIfExists('public_scenery_items');
    }
}
