<div id="modalExclusao{{ $professor->id }}" class="modal">
    <div class="modal-conteudo">
        <span class="fechar" onclick="fecharModal({{ $professor->id }}, 'Exclusao')">&times;</span>
        <h2>Apagar professor</h2>
        <p>Tem certeza que deseja apagar este professor?</p>
        <p>
            <em>
                <b>ID:</b> {{ $professor->id }}
                <br>
                <b>Nome:</b> {{ $professor->nome }}
                <br>
                <b>SIAP:</b> {{ $professor->siap }}
                <br>
                <b>E-mail:</b> {{ $professor->email }}
            </em>
        </p>
        <form method="post" action="{{ route('professores/apagar', $professor->id) }}" class="formExclusao">
            @method('delete')
            @csrf
            <button 
                type="button"
                onclick="fecharModal({{ $professor->id }}, 'Exclusao')">
                Cancelar
            </button>
            <button 
                type="submit">
                Excluir
            </button>
        </form>
    </div>
</div>