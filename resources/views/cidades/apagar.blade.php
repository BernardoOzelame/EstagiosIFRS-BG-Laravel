<div id="modalExclusao{{ $cidade->id }}" class="modal">
    <div class="modal-conteudo">
        <span class="fechar" onclick="fecharModal({{ $cidade->id }}, 'Exclusao')">&times;</span>
        <h2>Apagar cidade</h2>
        <p>Tem certeza que deseja apagar esta cidade?</p>
        <p>
            <em>
                <b>ID:</b> {{ $cidade->id }}
                <br>
                <b>Nome:</b> {{ $cidade->nome }}
                <br>
                <b>UF:</b> {{ $cidade->uf }}
            </em>
        </p>
        <form method="post" action="{{ route('cidades/apagar', $cidade->id) }}" class="formExclusao">
            @method('delete')
            @csrf
            <button 
                type="button"
                onclick="fecharModal({{ $cidade->id }}, 'Exclusao')">
                Cancelar
            </button>
            <button 
                type="submit">
                Excluir
            </button>
        </form>
    </div>
</div>