<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivateSceneriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_sceneries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('param_menu_category_id');
            $table->unsignedBigInteger('scenery_id');
            $table->integer('position_x')->default(11);
            $table->integer('position_y')->default(11);
            $table->integer('max_visitors')->default(12);
            $table->integer('price_uppercut')->default(250);
            $table->integer('price_coconut')->default(25);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('param_menu_category_id')
                ->references('id')
                ->on('parametric_table_values')
                ->cascadeOnDelete();

            $table->foreign('scenery_id')
                ->references('id')
                ->on('sceneries')
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
        Schema::dropIfExists('private_sceneries');
    }
}
