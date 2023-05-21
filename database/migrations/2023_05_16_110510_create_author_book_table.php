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
        Schema::create('author_book', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->unsignedBigInteger('id_autor');
            $table->unsignedBigInteger('id_libro');
            $table->timestamps();
            $table->primary(['id_autor', 'id_libro']);
            $table->foreign('id_autor')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('id_libro')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author_book');
    }
};
