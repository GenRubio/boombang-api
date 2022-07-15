<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSceneriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sceneries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('file_name');
            $table->text('file_path');
            $table->text('bit_map')->nullable();
            $table->integer('parameter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sceneries');
    }
}
