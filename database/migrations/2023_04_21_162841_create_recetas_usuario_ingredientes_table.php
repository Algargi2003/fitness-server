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
        Schema::create('recetas_usuario_ingredientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receta_id');
            $table->unsignedBigInteger('ingrediente_id');
            $table->double('cantidad')->nullable();
            $table->double('kcal')->nullable();
            $table->double('proteinas')->nullable();
            $table->double('grasas')->nullable();
            $table->double('carbohidratos')->nullable();
            $table->timestamps();
            $table->foreign('receta_id')->references('id')->on('recetas_usuario')->onDelete('cascade');
            $table->foreign('ingrediente_id')->references('id')->on('ingredientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas_usuario_ingredientes');
    }
};
