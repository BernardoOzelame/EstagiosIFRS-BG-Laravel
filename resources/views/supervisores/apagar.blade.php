<div id="modalExclusao{{ $supervisor->id }}" class="modal">
    <div class="modal-conteudo">
        <span class="fechar" onclick="fecharModal({{ $supervisor->id }}, 'Exclusao')">&times;</span>
        <h2>Apagar supervisor</h2>
        <p>Tem certeza que deseja apagar este supervisor?</p>
        <p>
            <em>
                <b>ID:</b> {{ $supervisor->id }}
                <br>
                <b>Nome:</b> {{ $supervisor->nome }}
                <br>
                <b>E-mail:</b> {{ $supervisor->email }}
                <br>
                <b>Cargo:</b> {{ $supervisor->cargo }}
                <br>
                <b>Empresa:</b> {{ $supervisor->empresa->nome }}
            </em>
        </p>
        <form method="post" action="{{ route('supervisores/apagar', $supervisor->id) }}" class="formExclusao">
            @method('delete')
            @csrf
            <button 
                type="button"
                onclick="fecharModal({{ $supervisor->id }}, 'Exclusao')">
                Cancelar
            </button>
            <button 
                type="submit">
                Excluir
            </button>
        </form>
    </div>
</div>