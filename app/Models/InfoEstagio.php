<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoEstagio extends Model {
    use HasFactory;

    protected $fillable = [
        'id',
        'cargaHoraria',
        'inicio',
        'termino',
        'previsaoFim',
        'situacao',
        'supervisores_id',
        'cursos_id',
        'professorOrientador_id',
        'professorCoOrientador_id',
        'empresas_id',
        'alunos_id'
    ];
}
