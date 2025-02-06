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
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('matricula')->unique();
            $table->string('nome');
            $table->string('email')->unique();
            $table->char('cpf', 14)->unique();
            $table->string('endereco');
            $table->char('telefoneCelular', 15);
            $table->integer('anoEstagio');
            $table->boolean('finalizou2Ano');
            $table->boolean('finalizouCurso');
            $table->foreignId('cidades_id')->constrained('cidades');
            $table->foreignId('curso_id')->constrained('cursos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
