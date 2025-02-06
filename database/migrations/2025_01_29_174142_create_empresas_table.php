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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->char('cnpj',18);
            $table->integer('numConvenio');
            $table->string('nome');
            $table->string('endereco');
            $table->char('telefoneCelular', 15);
            $table->string('email')->unique();
            $table->foreignId('areas_id')->constrained('areas');
            $table->foreignId('cidades_id')->constrained('cidades');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
