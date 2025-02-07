<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Empresa;
use App\Models\Cidade;
use Illuminate\Http\Request;

class EmpresasController extends Controller {
    public function index() {
        $dados = Empresa::with(['cidade', 'area'])->get();
        return view('empresas/index', [
            'empresas' => $dados
        ]);
    }

    public function cadastrar() {
        $dados = Empresa::all();
        $cidades = Cidade::all();
        $areas = Area::all();
        return view('empresas/cadastrar', [
            'empresas' => $dados,
            'areas'=> $areas,
            'cidades'=> $cidades
        ]);
    }

    public function gravar(Request $form) {
        $cidades = Cidade::pluck('id')->toArray();
        $areas = Area::pluck('id')->toArray();

        $dados = $form->validate([
            'nome'=> 'required',
            'cnpj' => 'required|unique:empresas',
            'numConvenio' => 'required|integer|unique:empresas',
            'telefoneCelular'=> 'required',
            'email'=> 'required|email|unique:empresas',
            'areas_id' => 'required|in:' . implode(',', $areas),
            'endereco'=> 'required',
            'cidades_id' => 'required|in:' . implode(',', $cidades),
        ],
        [
            'areas_id.in' => 'A área selecionada é inválida.',
            'cidades_id.in' => 'A cidade selecionada é inválida.'
        ]);
        Empresa::create($dados);
        return redirect()->route('empresas')->with('sucesso', 'Empresa cadastrada com sucesso!');
    }

    public function editar(Empresa $empresa) {
        $cidades = Cidade::all();
        $areas = Area::all();
        return view('empresas/editar', [
            'empresa' => $empresa,
            'areas'=> $areas,
            'cidades'=> $cidades
        ]);
    }

    public function editarGravar(Request $form, Empresa $empresa) {
        $cidades = Cidade::pluck('id')->toArray();
        $areas = Area::pluck('id')->toArray();

        $dados = $form->validate([
            'nome'=> 'required',
            'cnpj'=> 'required|unique:empresas,cnpj,' . $empresa->id,
            'numConvenio' => 'required|integer|unique:empresas,numConvenio,' . $empresa->id,
            'telefoneCelular'=> 'required',
            'email'=> 'required|email|unique:empresas,email,' . $empresa->id,
            'areas_id' => 'required|in:' . implode(',', $areas),
            'endereco'=> 'required',
            'cidades_id' => 'required|in:' . implode(',', $cidades),
        ],
        [
            'areas_id.in' => 'A área selecionada é inválida.',
            'cidades_id.in' => 'A cidade selecionada é inválida.'
        ]);
        $empresa->fill($dados);
        $empresa->save();
        return redirect()->route('empresas')->with('sucesso', 'Informações salvas com sucesso!');
    }

    public function apagar(Empresa $empresa) {
        return view('empresas/apagar', [
            'empresa' => $empresa,
        ]);
    }

    public function deletar(Empresa $empresa) {
        $empresa->delete();
        return redirect()->route('empresas')->with('sucesso', 'Empresa excluída com sucesso!');
    }
}
