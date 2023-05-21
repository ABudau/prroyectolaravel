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
        Schema::create('book_user', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_libro');
            $table->integer('puntuacion');
            $table->text('comentario');
            $table->date('fecha');
            $table->integer('descuento');
            $table->timestamps();
            $table->primary(['id_usuario', 'id_libro']);
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_libro')->references('id')->on('books')->onDelete('cascade');
        });;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_user');
    }
};
