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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id(); 
            $table->string('titulo'); 
            $table->text('descripcion')->nullable(); 
            $table->date('fecha_limite');
            $table->string('prioridad');
            $table->enum('estado', ['pendiente', 'en_progreso', 'completada'])->default('pendiente');

            // Agregar la columna proyecto_id como clave foránea
            $table->unsignedBigInteger('proyecto_id')->nullable();
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};