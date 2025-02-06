<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representante extends Model {
    use HasFactory;
    protected $table = 'representantes';

    protected $fillable = [
        'id',
        'nome',
        'funcao',
        'cpf',
        'empresas_id',
    ];
}
