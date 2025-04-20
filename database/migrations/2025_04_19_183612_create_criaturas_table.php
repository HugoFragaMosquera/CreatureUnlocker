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
        Schema::create('criaturas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('nivel')->default(1);  // Se agregó el campo 'nivel' para que las criaturas tengan un nivel
            $table->integer('ataque');
            $table->integer('defensa');
            $table->enum('calidad', ['común', 'rara', 'épica', 'legendaria']); // Calidad de la criatura (común, rara, épica, legendaria)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criaturas');
    }
};