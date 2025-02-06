<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadesController extends Controller {
    public function index() {
        $dados = Cidade::all();
        return view('cidades/index', [
            'cidades' => $dados
        ]);
    }

    public function cadastrar() {
        $dados = Cidade::all();
        return view('cidades/cadastrar', [
            'cidades' => $dados,
        ]);
    }

    public function gravar(Request $form) {
        $dados = $form->validate([
            'nome' => 'required',
            'uf'=> 'required|max:2',
        ]);
        Cidade::create($dados);
        return redirect()->route('cidades')->with('sucesso', 'Cidade cadastrada com sucesso!');
    }

    public function editar(Cidade $cidade) {
        return view('cidades/editar', [
            'cidade' => $cidade
        ]);
    }

    public function editarGravar(Request $form, Cidade $cidade) {
        $dados = $form->validate([
            'nome' => 'required',
            'uf'=> 'required|max:2',
        ]);
        $cidade->fill($dados);
        $cidade->save();
        return redirect()->route('cidades')->with('sucesso', 'Informações salvas com sucesso!');
    }

    public function apagar(Cidade $cidade) {
        return view('cidades/apagar', [
            'cidade' => $cidade,
        ]);
    }

    public function deletar(Cidade $cidade) {
        $cidade->delete();
        return redirect()->route('cidades')->with('sucesso', 'Cidade excluída com sucesso!');
    }
}
