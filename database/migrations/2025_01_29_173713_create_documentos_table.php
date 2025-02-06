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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->enum('tipoDocumento', ['Físico', 'Digital']);
            $table->string('enderecoArquivo')->nullable();
            $table->enum('documento', ['Ficha de Autoavaliação', 'Termo de Compromisso', 'Plano de Atividades', 'Ficha de Avaliação', 'Relatório Final']);
            $table->foreignId('infoEstagios_id')->constrained('info_estagios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
