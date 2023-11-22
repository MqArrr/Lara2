<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->string('author');

            $table->unsignedBigInteger('reader_id')->nullable();
            $table->unsignedBigInteger('library_id')->nullable();

            $table->foreign('reader_id')->references('id')->on('readers');
            $table->foreign('library_id')->references('id')->on('libraries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
