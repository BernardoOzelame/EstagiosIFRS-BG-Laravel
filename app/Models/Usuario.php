<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements Authenticatable {
    use HasFactory, AuthenticatableTrait;

    protected $fillable = [
        "id",
        "nome",
        "login",
        "password", // Considere renomear para 'password' para seguir as convenções do Laravel
        "tipoUsuario"
    ];

    // Se o campo de senha for 'senha' em vez de 'password', você precisa especificar isso
    public function getAuthPassword() {
        return $this->password;
    }

    // Se você não pretende usar a funcionalidade de "lembrar-me", pode deixar esses métodos assim
    public function getRememberToken() {
        return null;
    }

    public function setRememberToken($value) {
        // Não faz nada
    }

    public function getRememberTokenName() {
        return '';
    }
}