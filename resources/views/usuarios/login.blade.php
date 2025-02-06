@php
    $arquivosCSS = [
        "css/login.css"
    ];
    $arquivosJS = [
        "js/iconSenhas.js"
    ];
@endphp

@extends('base')

@section('titulo', 'Login')

@section('conteudo')

    @if($errors->any())
    <div>
        <h4>Preenche a porcaria do formulário</h4>
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="container">
        <div class="borda">
            <img src="{{ asset('imgs/logoIFRS.png') }}" class="logo">
        </div>
        <div class="formLogin">
            <h1>LOGIN</h1>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <label for="login">Usuário</label>
                <input class="inputs" placeholder="Usuário" type="text" name="login" id="login">
                <br>
                <div class="input-container">
                    <label for="password">Senha</label>
                    <input class="inputs" placeholder="Senha" type="password" name="password" id="password">
                    <i class="toggle-icon far fa-eye" id="mostrarSenhaIcon"></i>
                </div>
                <div class="enviar">
                    <button type="submit">Acessar</button>
                </div>
            </form>
        </div>
    </div>
    @if(session('erro'))
        <div style='background-color: red; color: white; width: 177px;'>{{ session('erro') }}</div>
    @endif
@endsection