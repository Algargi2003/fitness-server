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
        Schema::create('recetas_usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('elaboracion');
            $table->unsignedBigInteger('user_id');
            $table->string('tipo')->nullable();
            $table->double('peso')->nullable();
            $table->double('kcal')->nullable();
            $table->double('proteinas')->nullable();
            $table->double('grasas')->nullable();
            $table->double('carbohidratos')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas_usuario');
    }
};
