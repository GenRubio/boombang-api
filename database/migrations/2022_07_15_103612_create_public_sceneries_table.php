<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicSceneriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_sceneries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('param_menu_category_id');
            $table->integer('parent_id')->default(0)->nullable();
            $table->unsignedBigInteger('scenery_id');
            $table->text('name');
            $table->integer('position_x')->default(11);
            $table->integer('position_y')->default(11);
            $table->integer('max_visitors')->default(12);
            $table->integer('price_uppercut')->default(250);
            $table->integer('price_coconut')->default(25);
            $table->integer('lft')->default(0);
            $table->integer('rgt')->default(0);
            $table->integer('depth')->default(0);
            $table->boolean('visible')->default(true);
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
        Schema::dropIfExists('public_sceneries');
    }
}
