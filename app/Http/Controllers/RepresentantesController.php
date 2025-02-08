<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Representante;
use Illuminate\Http\Request;

class RepresentantesController extends Controller {
    public function index() {
        $dados = Representante::with('empresa')->get();
        return view('representantes/index', [
            'representantes' => $dados
        ]);
    }

    public function cadastrar() {
        $dados = Representante::all();
        $empresas = Empresa::all();
        return view('representantes/cadastrar', [
            'representantes' => $dados,
            'empresas'=> $empresas
        ]);
    }

    public function gravar(Request $form) {
        $empresas = Empresa::pluck('id')->toArray();

        $dados = $form->validate([
            'nome'=> 'required',
            'funcao' => 'required',
            'cpf'=> 'required|unique:representantes',
            'empresas_id' => 'required|in:' . implode(',', $empresas),
        ],
        [
            'empresas_id.in' => 'A empresa selecionada é inválida.'
        ]);
        Representante::create($dados);
        return redirect()->route('representantes')->with('sucesso', 'Representante cadastrado com sucesso!');
    }

    public function editar(Representante $representante) {
        $empresas = Empresa::all();
        return view('representantes/editar', [
            'representante' => $representante,
            'empresas'=> $empresas
        ]);
    }

    public function editarGravar(Request $form, Representante $representante) {
        $empresas = Empresa::pluck('id')->toArray();

        $dados = $form->validate([
            'nome'=> 'required',
            'funcao'=> 'required',
            'cpf'=> 'required|unique:representantes,cpf,' . $representante->id,
            'empresas_id' => 'required|in:' . implode(',', $empresas),
        ],
        [
            'empresas_id.in' => 'A empresa selecionada é inválida.'
        ]);
        $representante->fill($dados);
        $representante->save();
        return redirect()->route('representantes')->with('sucesso', 'Informações salvas com sucesso!');
    }

    public function apagar(Representante $representante) {
        return view('representantes/apagar', [
            'representante' => $representante,
        ]);
    }

    public function deletar(Representante $representante) {
        $representante->delete();
        return redirect()->route('representantes')->with('sucesso', 'Representante excluído com sucesso!');
    }
}
