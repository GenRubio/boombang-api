<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIslandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('islands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('island_type_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('model');
            $table->boolean('uppercut')->default(true);
            $table->timestamps();

            $table->foreign('island_type_id')
                ->references('id')
                ->on('island_types')
                ->cascadeOnDelete();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('islands');
    }
}
