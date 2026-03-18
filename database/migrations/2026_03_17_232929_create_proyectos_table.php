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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('ubicacion')->nullable();
            $table->enum('estado', ['En ejecución', 'Finalizado', 'Planificado', 'Cancelado']) ->default('Planificado');
            $table->decimal('costo', 10, 2)->default(0);
            $table->unsignedTinyInteger('avance')->default(0);
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin');
            $table->date('plazo')->nullable();

            // Relaciones
            $table->foreignId('area_id')->constrained()->onDelete('cascade');
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
