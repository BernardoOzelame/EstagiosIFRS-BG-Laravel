<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder {
    public function run(): void {
        DB::table('users')->insert([
            [
                'nome' => 'Administrador',
                'login' => 'admin',
                'password' => Hash::make('admin'),
                'tipoUsuario' => 'Administrador'
            ],
            [
                'nome' => 'Empresa',
                'login' => 'empresa',
                'password' => Hash::make('empresa'),
                'tipoUsuario' => 'Empresa'
            ],
            [
                'nome' => 'Estagiário',
                'login' => 'estagiario',
                'password' => Hash::make('estagiario'),
                'tipoUsuario' => 'Estagiário'
            ]
        ]);
    }
}
