<div id="modalExclusao{{ $empresa->id }}" class="modal">
    <div class="modal-conteudo">
        <span class="fechar" onclick="fecharModal({{ $empresa->id }}, 'Exclusao')">&times;</span>
        <h2>Apagar empresa</h2>
        <p>Tem certeza que deseja apagar esta empresa?</p>
        <p>
            <em>
                <b>ID:</b> {{ $empresa->id }}
                <br>
                <b>Nome:</b> {{ $empresa->nome }}
                <br>
                <b>Número do Convênio:</b> {{ $empresa->numConvenio }}
                <br>
                <b>CNPJ:</b> {{ $empresa->cnpj }}
            </em>
        </p>
        <form method="post" action="{{ route('empresas/apagar', $empresa->id) }}" class="formExclusao">
            @method('delete')
            @csrf
            <button 
                type="button"
                onclick="fecharModal({{ $empresa->id }}, 'Exclusao')">
                Cancelar
            </button>
            <button 
                type="submit">
                Excluir
            </button>
        </form>
    </div>
</div>