<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametricTableValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametric_table_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parametric_table_id');
            $table->string('name');
            $table->integer('parameter');
            $table->timestamps();

            $table->foreign('parametric_table_id')
                ->references('id')
                ->on('parametric_tables')
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
        Schema::dropIfExists('parametric_table_values');
    }
}
