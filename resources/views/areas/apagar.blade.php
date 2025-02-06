<div id="modalExclusao{{ $area->id }}" class="modal">
    <div class="modal-conteudo">
        <span class="fechar" onclick="fecharModal({{ $area->id }}, 'Exclusao')">&times;</span>
        <h2>Apagar área</h2>
        <p>Tem certeza que deseja apagar esta área?</p>
        <p>
            <em>
                <b>ID:</b> {{ $area->id }}
                <br>
                <b>Nome:</b> {{ $area->nome }}
            </em>
        </p>
        <form method="post" action="{{ route('areas/apagar', $area->id) }}" class="formExclusao">
            @method('delete')
            @csrf
            <button 
                type="button"
                onclick="fecharModal({{ $area->id }}, 'Exclusao')">
                Cancelar
            </button>
            <button 
                type="submit">
                Excluir
            </button>
        </form>
    </div>
</div>