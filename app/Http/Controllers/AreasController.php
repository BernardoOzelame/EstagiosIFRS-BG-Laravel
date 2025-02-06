<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreasController extends Controller {
    public function index() {
        $dados = Area::all();
        return view('areas/index', [
            'areas' => $dados
        ]);
    }

    public function cadastrar() {
        $dados = Area::all();
        return view('areas/cadastrar', [
            'areas' => $dados,
        ]);
    }

    public function gravar(Request $form) {
        $dados = $form->validate([
            'nome' => 'required'
        ]);
        Area::create($dados);
        return redirect()->route('areas')->with('sucesso', 'Área cadastrada com sucesso!');
    }

    public function editar(Area $area) {
        return view('areas/editar', [
            'area' => $area
        ]);
    }

    public function editarGravar(Request $form, Area $area) {
        $dados = $form->validate([
            'nome' => 'required'
        ]);
        $area->fill($dados);
        $area->save();
        return redirect()->route('areas')->with('sucesso', 'Informações salvas com sucesso!');
    }

    public function apagar(Area $area) {
        return view('areas/apagar', [
            'area' => $area,
        ]);
    }

    public function deletar(Area $area) {
        $area->delete();
        return redirect()->route('areas')->with('sucesso', 'Área excluída com sucesso!');
    }
}
