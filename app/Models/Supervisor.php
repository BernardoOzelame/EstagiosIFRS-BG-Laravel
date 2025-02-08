<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model {
    use HasFactory;
    protected $table = 'supervisores';

    protected $fillable = [
        'id',
        'nome',
        'email',
        'cargo',
        'formacao',
        'telefoneCelular',
        'empresas_id'
    ];

    public function empresa() {
        return $this->belongsTo(Empresa::class, 'empresas_id');
    }
}
