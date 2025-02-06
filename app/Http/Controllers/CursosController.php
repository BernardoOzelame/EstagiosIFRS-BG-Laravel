<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursosController extends Controller {
    public function index() {
        $dados = Curso::all();
        return view('cursos/index', [
            'cursos' => $dados
        ]);
    }

    public function cadastrar() {
        $dados = Curso::all();
        return view('cursos/cadastrar', [
            'cursos' => $dados,
        ]);
    }

    public function gravar(Request $form) {
        $dados = $form->validate([
            'nome' => 'required'
        ]);
        Curso::create($dados);
        return redirect()->route('cursos')->with('sucesso', 'Curso cadastrado com sucesso!');
    }

    public function editar(Curso $curso) {
        return view('cursos/editar', [
            'curso' => $curso
        ]);
    }

    public function editarGravar(Request $form, Curso $curso) {
        $dados = $form->validate([
            'nome' => 'required'
        ]);
        $curso->fill($dados);
        $curso->save();
        return redirect()->route('cursos')->with('sucesso', 'Informações salvas com sucesso!');
    }

    public function apagar(Curso $curso) {
        return view('cursos/apagar', [
            'curso' => $curso,
        ]);
    }

    public function deletar(Curso $curso) {
        $curso->delete();
        return redirect()->route('cursos')->with('sucesso', 'Curso excluído com sucesso!');
    }
}