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
        Schema::create('notas_estagios', function (Blueprint $table) {
            $table->id();
            $table->float('notaProfessorOrientador');
            $table->float('notaProfessorCoOrientador');
            $table->float('notaEmpresa');
            $table->float('notaRepresentante');
            $table->float('notaSupervisor');
            $table->float('notaAluno');
            $table->float('notaFinal')->nullable();
            $table->enum('situacao', ['Aprovado', 'Reprovado'])->nullable();
            $table->foreignId('infoEstagios_id')->constrained('info_estagios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas_estagios');
    }
};
