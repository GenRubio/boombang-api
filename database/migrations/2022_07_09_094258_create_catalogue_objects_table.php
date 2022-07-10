<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogueObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogue_objects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('object_id');
            $table->unsignedBigInteger('catalogue_category_id');
            $table->integer('price_gold')->default(1000);
            $table->integer('price_silver')->default(-1);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('object_id')
                ->references('id')
                ->on('objects')
                ->cascadeOnDelete();

            $table->foreign('catalogue_category_id')
                ->references('id')
                ->on('catalogue_categories')
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
        Schema::dropIfExists('catalogue_objects');
    }
}
