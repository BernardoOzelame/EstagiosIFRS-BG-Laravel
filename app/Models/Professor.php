<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model {
    use HasFactory;
    protected $table = 'professores';
    protected $fillable = [
        'id',
        'nome',
        'siap',
        'email',
        'areas_id',
    ];

    public function area() {
        return $this->belongsTo(Area::class, 'areas_id');
    }
}
