<div id="modalExclusao{{ $usuario->id }}" class="modal">
    <div class="modal-conteudo">
        <span class="fechar" onclick="fecharModal({{ $usuario->id }}, 'Exclusao')">&times;</span>
        <h2>Apagar usuário</h2>
        <p>Tem certeza que deseja apagar este usuário?</p>
        <p>
            <em>
                <b>ID:</b> {{ $usuario->id }} 
                <br>
                <b>Nome:</b> {{ $usuario->nome }}
                <br>
                <b>Login:</b> {{ $usuario->login }}
                <br>
                <b>Permissão:</b> {{ $usuario->tipoUsuario }}
            </em>
        </p>
        <form method="post" action="{{ route('usuarios/apagar', $usuario->id) }}" class="formExclusao">
            @method('delete')
            @csrf
            <button 
                type="button"
                onclick="fecharModal({{ $usuario->id }}, 'Exclusao')">
                Cancelar
            </button>
            <button 
                type="submit">
                Excluir
            </button>
        </form>
    </div>
</div>