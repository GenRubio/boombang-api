<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivateSceneryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_scenery_items', function (Blueprint $table) {
            $table->unsignedBigInteger('private_scenery_id');
            $table->unsignedBigInteger('item_id');
            $table->timestamps();

            $table->foreign('private_scenery_id')
                ->references('id')
                ->on('private_sceneries')
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
        Schema::dropIfExists('private_scenery_items');
    }
}
