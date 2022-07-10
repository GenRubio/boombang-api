<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicSceneriesArrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_sceneries_arrows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('public_scenery_id');
            $table->unsignedBigInteger('next_public_scenery_id');
            $table->unsignedBigInteger('scenery_arrow_id');
            $table->integer('position_x');
            $table->integer('position_y');
            $table->integer('next_position_x');
            $table->integer('next_position_y');
            $table->timestamps();

            $table->foreign('public_scenery_id')
                ->references('id')
                ->on('public_sceneries')
                ->cascadeOnDelete();

            $table->foreign('next_public_scenery_id')
                ->references('id')
                ->on('public_sceneries')
                ->cascadeOnDelete();

            $table->foreign('scenery_arrow_id')
                ->references('id')
                ->on('scenery_arrows')
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
        Schema::dropIfExists('public_sceneries_arrows');
    }
}
