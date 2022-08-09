<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLangTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lang_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lang_section_id')->nullable();
            $table->unsignedBigInteger('lang_file_id')->nullable();
            $table->string('name');
            $table->string('format_name');
            $table->text('value');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('lang_section_id')
                ->references('id')->on('lang_sections')
                ->onDelete('cascade');
            $table->foreign('lang_file_id')
                ->references('id')->on('lang_files')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lang_translations');
    }
}
