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
        Schema::table('tareas', function (Blueprint $table) {
            // Agregar la columna nombre_proyecto
            $table->string('nombre_proyecto')->after('id')->nullable();

            // Eliminar la clave foránea y la columna proyecto_id si existen
            $table->dropForeign(['proyecto_id']);
            $table->dropColumn('proyecto_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tareas', function (Blueprint $table) {
            // Volver a agregar proyecto_id
            $table->unsignedBigInteger('proyecto_id')->nullable();
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');

            // Eliminar la columna nombre_proyecto
            $table->dropColumn('nombre_proyecto');
        });
    }
};