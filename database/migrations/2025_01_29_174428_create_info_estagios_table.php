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
        Schema::create('info_estagios', function (Blueprint $table) {
            $table->id();
            $table->string('cargaHoraria');
            $table->date('inicio');
            $table->date('termino')->nullable();
            $table->date('previsaoFim');
            $table->enum('situacao', ['Em andamento', 'Finalizado', 'Não iniciado']);
            $table->foreignId('supervisores_id')->nullable()->constrained('supervisores');
            $table->foreignId('cursos_id')->constrained('cursos');
            $table->foreignId('professorOrientador_id')->nullable()->constrained('professores');
            $table->foreignId('professorCoOrientador_id')->nullable()->constrained('professores');
            $table->foreignId('empresas_id')->nullable()->constrained('empresas');
            $table->foreignId('alunos_id')->constrained('alunos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_estagios');
    }
};
