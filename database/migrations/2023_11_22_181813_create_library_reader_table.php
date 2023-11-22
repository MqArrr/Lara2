<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('library_reader', function (Blueprint $table) {
            $table->unsignedBigInteger('library_id');
            $table->unsignedBigInteger('reader_id');
            $table->foreign('library_id')->references('id')->on('libraries');
            $table->foreign('reader_id')->references('id')->on('readers');
        });
    }

    /**
     * Откат миграций.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('library_reader');
    }
};

