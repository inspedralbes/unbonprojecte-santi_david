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
        Schema::create('llibres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titol');
            $table->string('autor');
            $table->integer('any');
            $table->string('editorial');
            $table->integer('pagines');
            $table->string('isbn');
            $table->string('imatge');
            $table->text('sinopsis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('llibres');
    }
};
