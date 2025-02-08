<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\CidadesController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\ProfessoresController;
use App\Http\Controllers\RepresentantesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::prefix('estagios')->middleware('auth')->group(function() {
    Route::get('/', function () {
        return view('index');
    })->name('estagios');
});

Route::prefix('usuarios')->middleware('auth')->group(function() {
    Route::get('/', [UsuariosController::class, 'index'])->name('usuarios');

    Route::get('/cadastrar', [UsuariosController::class, 'cadastrar'])->name('usuarios/cadastrar');
    
    Route::post('/cadastrar', [UsuariosController::class, 'gravar'])->name('usuarios/gravar');
    
    Route::get('/editar/{user}', [UsuariosController::class, 'editar'])->name('usuarios/editar');
    
    Route::put('/editar/{user}', [UsuariosController::class, 'editarGravar']);
    
    Route::get('/apagar/{user}', [UsuariosController::class, 'apagar'])->name('usuarios/apagar'); 
    
    Route::delete('/apagar/{user}', [UsuariosController::class, 'deletar']);
});

Route::prefix('alunos')->middleware('auth')->group(function() {
    Route::get('/', [AlunosController::class, 'index'])->name('alunos');

    Route::get('/cadastrar', [AlunosController::class, 'cadastrar'])->name('alunos/cadastrar');
    
    Route::post('/cadastrar', [AlunosController::class, 'gravar'])->name('alunos/gravar');
    
    Route::get('/editar/{aluno}', [AlunosController::class, 'editar'])->name('alunos/editar');
    
    Route::put('/editar/{aluno}', [AlunosController::class, 'editarGravar']);
    
    Route::get('/apagar/{aluno}', [AlunosController::class, 'apagar'])->name('alunos/apagar'); 
    
    Route::delete('/apagar/{aluno}', [AlunosController::class, 'deletar']);
});

Route::prefix('areas')->middleware('auth')->group(function() {
    Route::get('/', [AreasController::class, 'index'])->name('areas');

    Route::get('/cadastrar', [AreasController::class, 'cadastrar'])->name('areas/cadastrar');
    
    Route::post('/cadastrar', [AreasController::class, 'gravar'])->name('areas/gravar');
    
    Route::get('/editar/{area}', [AreasController::class, 'editar'])->name('areas/editar');
    
    Route::put('/editar/{area}', [AreasController::class, 'editarGravar']);
    
    Route::get('/apagar/{area}', [AreasController::class, 'apagar'])->name('areas/apagar'); 
    
    Route::delete('/apagar/{area}', [AreasController::class, 'deletar']);
});

Route::prefix('cidades')->middleware('auth')->group(function() {
    Route::get('/', [CidadesController::class, 'index'])->name('cidades');

    Route::get('/cadastrar', [CidadesController::class, 'cadastrar'])->name('cidades/cadastrar');
    
    Route::post('/cadastrar', [CidadesController::class, 'gravar'])->name('cidades/gravar');
    
    Route::get('/editar/{cidade}', [CidadesController::class, 'editar'])->name('cidades/editar');
    
    Route::put('/editar/{cidade}', [CidadesController::class, 'editarGravar']);
    
    Route::get('/apagar/{cidade}', [CidadesController::class, 'apagar'])->name('cidades/apagar'); 
    
    Route::delete('/apagar/{cidade}', [CidadesController::class, 'deletar']);
});

Route::prefix('cursos')->middleware('auth')->group(function() {
    Route::get('/', [CursosController::class, 'index'])->name('cursos');

    Route::get('/cadastrar', [CursosController::class, 'cadastrar'])->name('cursos/cadastrar');
    
    Route::post('/cadastrar', [CursosController::class, 'gravar'])->name('cursos/gravar');
    
    Route::get('/editar/{curso}', [CursosController::class, 'editar'])->name('cursos/editar');
    
    Route::put('/editar/{curso}', [CursosController::class, 'editarGravar']);
    
    Route::get('/apagar/{curso}', [CursosController::class, 'apagar'])->name('cursos/apagar'); 
    
    Route::delete('/apagar/{curso}', [CursosController::class, 'deletar']);
});

Route::prefix('empresas')->middleware('auth')->group(function() {
    Route::get('/', [EmpresasController::class, 'index'])->name('empresas');

    Route::get('/cadastrar', [EmpresasController::class, 'cadastrar'])->name('empresas/cadastrar');
    
    Route::post('/cadastrar', [EmpresasController::class, 'gravar'])->name('empresas/gravar');
    
    Route::get('/editar/{empresa}', [EmpresasController::class, 'editar'])->name('empresas/editar');
    
    Route::put('/editar/{empresa}', [EmpresasController::class, 'editarGravar']);
    
    Route::get('/apagar/{empresa}', [EmpresasController::class, 'apagar'])->name('empresas/apagar'); 
    
    Route::delete('/apagar/{empresa}', [EmpresasController::class, 'deletar']);
});

Route::prefix('professores')->middleware('auth')->group(function() {
    Route::get('/', [ProfessoresController::class, 'index'])->name('professores');

    Route::get('/cadastrar', [ProfessoresController::class, 'cadastrar'])->name('professores/cadastrar');
    
    Route::post('/cadastrar', [ProfessoresController::class, 'gravar'])->name('professores/gravar');
    
    Route::get('/editar/{professor}', [ProfessoresController::class, 'editar'])->name('professores/editar');
    
    Route::put('/editar/{professor}', [ProfessoresController::class, 'editarGravar']);
    
    Route::get('/apagar/{professor}', [ProfessoresController::class, 'apagar'])->name('professores/apagar'); 
    
    Route::delete('/apagar/{professor}', [ProfessoresController::class, 'deletar']);
});

Route::prefix('representantes')->middleware('auth')->group(function() {
    Route::get('/', [RepresentantesController::class, 'index'])->name('representantes');

    Route::get('/cadastrar', [RepresentantesController::class, 'cadastrar'])->name('representantes/cadastrar');
    
    Route::post('/cadastrar', [RepresentantesController::class, 'gravar'])->name('representantes/gravar');
    
    Route::get('/editar/{representante}', [RepresentantesController::class, 'editar'])->name('representantes/editar');
    
    Route::put('/editar/{representante}', [RepresentantesController::class, 'editarGravar']);
    
    Route::get('/apagar/{representante}', [RepresentantesController::class, 'apagar'])->name('representantes/apagar'); 
    
    Route::delete('/apagar/{representante}', [RepresentantesController::class, 'deletar']);
});

Route::get('/login', [UsuariosController::class, 'login'])->name('login');
Route::post('/login', [UsuariosController::class, 'login']);
Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');