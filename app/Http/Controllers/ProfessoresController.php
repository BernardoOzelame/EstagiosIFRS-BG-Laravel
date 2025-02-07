<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessoresController extends Controller {
    public function index() {
        $dados = Professor::with('area')->get();
        return view('professores/index', [
            'professores' => $dados
        ]);
    }

    public function cadastrar() {
        $dados = Professor::all();
        $areas = Area::all();
        return view('professores/cadastrar', [
            'professores' => $dados,
            'areas'=> $areas
        ]);
    }

    public function gravar(Request $form) {
        $areas = Area::pluck('id')->toArray();

        $dados = $form->validate([
            'nome'=> 'required',
            'siap' => 'required|unique:professores',
            'email'=> 'required|email|unique:professores',
            'areas_id' => 'required|in:' . implode(',', $areas),
        ],
        [
            'areas_id.in' => 'A área selecionada é inválida.'
        ]);
        Professor::create($dados);
        return redirect()->route('professores')->with('sucesso', 'Professor cadastrado com sucesso!');
    }

    public function editar(Professor $professor) {
        $areas = Area::all();
        return view('professores/editar', [
            'professor' => $professor,
            'areas'=> $areas
        ]);
    }

    public function editarGravar(Request $form, Professor $professor) {
        $areas = Area::pluck('id')->toArray();

        $dados = $form->validate([
            'nome'=> 'required',
            'siap'=> 'required|unique:professores,siap,' . $professor->id,
            'email'=> 'required|email|unique:professores,email,' . $professor->id,
            'areas_id' => 'required|in:' . implode(',', $areas),
        ],
        [
            'areas_id.in' => 'A área selecionada é inválida.'
        ]);
        $professor->fill($dados);
        $professor->save();
        return redirect()->route('professores')->with('sucesso', 'Informações salvas com sucesso!');
    }

    public function apagar(Professor $professor) {
        return view('professores/apagar', [
            'professor' => $professor,
        ]);
    }

    public function deletar(Professor $professor) {
        $professor->delete();
        return redirect()->route('professores')->with('sucesso', 'Professor excluído com sucesso!');
    }
}
