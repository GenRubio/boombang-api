<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogueGameObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogue_game_objects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_object_id');
            $table->unsignedBigInteger('param_catalogue_category_id');
            $table->integer('price_gold')->default(1000);
            $table->integer('price_silver')->default(-1);
            $table->boolean('vip')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('game_object_id')
                ->references('id')
                ->on('game_objects')
                ->cascadeOnDelete();

            $table->foreign('param_catalogue_category_id')
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
        Schema::dropIfExists('catalogue_game_objects');
    }
}
