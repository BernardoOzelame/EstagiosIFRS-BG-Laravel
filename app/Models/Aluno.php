<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model {
    use HasFactory;

    protected $fillable = [
        'id',
        'matricula',
        'nome',
        'email',
        'cpf',
        'endereco',
        'telefoneCelular',
        'anoEstagio',
        'finalizou2Ano',
        'finalizouCurso',
        'cidades_id',
        'curso_id'
    ];

    public function cidade() {
        return $this->belongsTo(Cidade::class, 'cidades_id');
    }

    public function curso() {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
