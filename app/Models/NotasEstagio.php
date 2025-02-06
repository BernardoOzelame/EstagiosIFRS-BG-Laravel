<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotasEstagio extends Model {
    use HasFactory;

    protected $fillable = [
        'id',
        'notaProfessorOrientador',
        'notaProfessorCoOrientador',
        'notaEmpresa',
        'notaRepresentante',
        'notaSupervisor',
        'notaAluno',
        'notaFinal',
        'situacao',
        'infoEstagios_id'
    ];
}
