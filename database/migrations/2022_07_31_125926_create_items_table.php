<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('param_item_appearance_id');
            $table->unsignedBigInteger('param_item_capture_id');
            $table->text('name')->nullable();
            $table->text('image')->nullable();
            $table->string('catch_message')->nullable()->default("ha atrapado");
            $table->text('parameter')->default("0");
            $table->integer('appearance_time')->default(120);
            $table->boolean('throw_in_public_sceneries')->default(true);
            $table->boolean('throw_in_private_sceneries')->default(true);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('param_item_appearance_id')
                ->references('id')
                ->on('parametric_table_values')
                ->cascadeOnDelete();

            $table->foreign('param_item_capture_id')
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
        Schema::dropIfExists('items');
    }
}
