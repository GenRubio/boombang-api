<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserIslandIslandSceneriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_island_island_sceneries', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('island_id');
            $table->unsignedBigInteger('island_scenery_id');
            $table->string('name');
            $table->string('password')->nullable();
            $table->text('colors_hex');
            $table->text('colors_rgb');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('island_id')
                ->references('id')
                ->on('islands')
                ->cascadeOnDelete();

            $table->foreign('island_scenery_id')
                ->references('id')
                ->on('island_sceneries')
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
        Schema::dropIfExists('user_island_island_sceneries');
    }
}
