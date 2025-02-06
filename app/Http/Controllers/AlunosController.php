<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Cidade;
use App\Models\Curso;
use Illuminate\Http\Request;

class AlunosController extends Controller {
    public function index() {
        $dados = Aluno::with(['cidade', 'curso'])->get();
        return view('alunos/index', [
            'alunos' => $dados
        ]);
    }

    public function cadastrar() {
        $dados = Aluno::all();
        $cidades = Cidade::all();
        $cursos = Curso::all();
        return view('alunos/cadastrar', [
            'alunos' => $dados,
            'cursos'=> $cursos,
            'cidades'=> $cidades
        ]);
    }

    public function gravar(Request $form) {
        $cidades = Cidade::pluck('id')->toArray();
        $cursos = Curso::pluck('id')->toArray();

        $dados = $form->validate([
            'nome' => 'required',
            'matricula' => 'required|unique:alunos',
            'cpf'=> 'required|unique:alunos',
            'curso_id' => 'required|in:' . implode(',', $cursos),
            'email'=> 'required|email|unique:alunos',
            'endereco'=> 'required',
            'cidades_id' => 'required|in:' . implode(',', $cidades),
            'telefoneCelular'=> 'required',
            'anoEstagio'=> 'required|integer',
            'finalizou2Ano'=> 'required',
            'finalizouCurso'=> 'required',
        ],
        [
            'curso_id.in' => 'O curso selecionado é inválido.',
            'cidades_id.in' => 'A cidade selecionada é inválida.'
        ]);
        Aluno::create($dados);
        return redirect()->route('alunos')->with('sucesso', 'Aluno cadastrado com sucesso!');
    }

    public function editar(Aluno $aluno) {
        $cidades = Cidade::all();
        $cursos = Curso::all();
        return view('alunos/editar', [
            'aluno' => $aluno,
            'cursos'=> $cursos,
            'cidades'=> $cidades
        ]);
    }

    public function editarGravar(Request $form, Aluno $aluno) {
        $cidades = Cidade::pluck('id')->toArray();
        $cursos = Curso::pluck('id')->toArray();

        $dados = $form->validate([
            'nome' => 'required',
            'matricula' => 'required|unique:alunos,matricula,' . $aluno->id,
            'cpf'=> 'required|unique:alunos,cpf,' . $aluno->id,
            'curso_id' => 'required|in:' . implode(',', $cursos),
            'email'=> 'required|unique:alunos,email,' . $aluno->id,
            'endereco'=> 'required',
            'cidades_id' => 'required|in:' . implode(',', $cidades),
            'telefoneCelular'=> 'required',
            'anoEstagio'=> 'required|integer',
            'finalizou2Ano'=> 'required',
            'finalizouCurso'=> 'required',
        ],
        [
            'curso_id.in' => 'O curso selecionado é inválido.',
            'cidades_id.in' => 'A cidade selecionada é inválida.'
        ]);
        $aluno->fill($dados);
        $aluno->save();
        return redirect()->route('alunos')->with('sucesso', 'Informações salvas com sucesso!');
    }

    public function apagar(Aluno $aluno) {
        return view('alunos/apagar', [
            'aluno' => $aluno,
        ]);
    }

    public function deletar(Aluno $aluno) {
        $aluno->delete();
        return redirect()->route('alunos')->with('sucesso', 'Aluno excluído com sucesso!');
    }
}
