<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {
    use HasFactory;

    protected $fillable = [
        'id',
        'cnpj',
        'numConvenio',
        'nome',
        'endereco',
        'telefoneCelular',
        'email',
        'areas_id',
        'cidades_id'
    ];

    public function cidade() {
        return $this->belongsTo(Cidade::class, 'cidades_id');
    }

    public function area() {
        return $this->belongsTo(Area::class, 'areas_id');
    }
}
