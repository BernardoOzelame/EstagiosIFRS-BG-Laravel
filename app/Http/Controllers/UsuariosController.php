<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller {
    public function index() {
        $dados = Usuario::orderBy('id', 'asc')->get();
        return view('usuarios/index', [
            'usuarios' => $dados
        ]);
    }

    public function cadastrar() {
        $dados = Usuario::all();
        $tiposUsuario = ["Administrador", "Empresa", "Estagiário"];
        return view('usuarios/cadastrar', [
            'usuarios' => $dados,
            'tiposUsuario' => $tiposUsuario
        ]);
    }

    public function gravar(Request $form) {
        $tiposUsuario = ["Administrador", "Empresa", "Estagiário"];
        $dados = $form->validate([
            'nome' => 'required',
            'login' => 'required|unique:usuarios',
            'password' => 'required',
            'tipoUsuario' => 'required|in:' . implode(',', $tiposUsuario)
        ],
        [
            'tipoUsuario.in' => 'O tipo de usuário selecionado é inválido.'
        ]);
        $dados['password'] = Hash::make($dados['password']);
        Usuario::create($dados);
        return redirect()->route('usuarios')->with('sucesso', 'Usuário cadastrado com sucesso!');
    }

    public function editar(Usuario $user) {
        $tiposUsuario = ["Administrador", "Empresa", "Estagiário"];
        return view('usuarios/editar', [
            'user' => $user,
            'tiposUsuario' => $tiposUsuario
        ]);
    }

    public function editarGravar(Request $form, Usuario $user) {
        $tiposUsuario = ["Administrador", "Empresa", "Estagiário"];
        $dados = $form->validate([
            'nome' => 'required',
            'login' => 'required|unique:usuarios,login,' . $user->id,
            'password' => 'nullable',
            'tipoUsuario' => 'required|in:' . implode(',', $tiposUsuario)
        ],
        [
            'tipoUsuario.in' => 'O tipo de usuário selecionado é inválido.'        
        ]);
        if ($form->filled('password')) {
            $dados['password'] = Hash::make($dados['password']);
        } else {
            unset($dados['password']);
        }
        $user->fill($dados);
        $user->save();
        return redirect()->route('usuarios')->with('sucesso', 'Informações salvas com sucesso!');
    }

    public function apagar(Usuario $user) {
        return view('usuarios/apagar', [
            'usuario' => $user,
        ]);
    }

    public function deletar(Usuario $user) {
        $user->delete();
        return redirect()->route('usuarios')->with('sucesso', 'Usuário excluído com sucesso!');
    }

    public function login(Request $form) {
        if($form->isMethod('POST')) {
            $credenciais = $form->validate([
                'login' => 'required',
                'password' => 'required',
            ]);
            if(Auth::attempt($credenciais)){
                return redirect()->intended(route('estagios'));
            } else {
                return redirect()->route('login')->with('erro', 'Usuário ou senha inválidos');
            }
        }
        return view('usuarios/login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('estagios');
    }
}
