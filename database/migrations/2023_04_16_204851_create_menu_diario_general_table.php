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
        Schema::create('menu_diario_general', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('kcal')->nullable();
            $table->integer('proteinas')->nullable();
            $table->integer('grasas')->nullable();
            $table->integer('carbohidratos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_general');
    }
};
