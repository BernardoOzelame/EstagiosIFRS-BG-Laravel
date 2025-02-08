<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class SupervisoresController extends Controller {
    public function index() {
        $dados = Supervisor::with('empresa')->get();
        return view('supervisores/index', [
            'supervisores' => $dados
        ]);
    }

    public function cadastrar() {
        $dados = Supervisor::all();
        $empresas = Empresa::all();
        return view('supervisores/cadastrar', [
            'supervisores' => $dados,
            'empresas'=> $empresas
        ]);
    }

    public function gravar(Request $form) {
        $empresas = Empresa::pluck('id')->toArray();

        $dados = $form->validate([
            'nome'=> 'required',
            'email' => 'required|email|unique:supervisores',
            'cargo'=> 'required',
            'formacao'=> 'required',
            'telefoneCelular'=> 'required',
            'empresas_id' => 'required|in:' . implode(',', $empresas),
        ],
        [
            'empresas_id.in' => 'A empresa selecionada é inválida.'
        ]);
        Supervisor::create($dados);
        return redirect()->route('supervisores')->with('sucesso', 'Supervisor cadastrado com sucesso!');
    }

    public function editar(Supervisor $supervisor) {
        $empresas = Empresa::all();
        return view('supervisores/editar', [
            'supervisor' => $supervisor,
            'empresas'=> $empresas
        ]);
    }

    public function editarGravar(Request $form, Supervisor $supervisor) {
        $empresas = Empresa::pluck('id')->toArray();

        $dados = $form->validate([
            'nome'=> 'required',
            'email'=> 'required|unique:supervisores,email,' . $supervisor->id,
            'cargo'=> 'required',
            'formacao'=> 'required',
            'telefoneCelular'=> 'required',
            'empresas_id' => 'required|in:' . implode(',', $empresas),
        ],
        [
            'empresas_id.in' => 'A empresa selecionada é inválida.'
        ]);
        $supervisor->fill($dados);
        $supervisor->save();
        return redirect()->route('supervisores')->with('sucesso', 'Informações salvas com sucesso!');
    }

    public function apagar(Supervisor $supervisor) {
        return view('supervisores/apagar', [
            'supervisor' => $supervisor,
        ]);
    }

    public function deletar(Supervisor $supervisor) {
        $supervisor->delete();
        return redirect()->route('supervisores')->with('sucesso', 'Supervisor excluído com sucesso!');
    }
}
