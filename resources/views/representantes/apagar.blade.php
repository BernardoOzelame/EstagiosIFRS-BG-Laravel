<div id="modalExclusao{{ $representante->id }}" class="modal">
    <div class="modal-conteudo">
        <span class="fechar" onclick="fecharModal({{ $representante->id }}, 'Exclusao')">&times;</span>
        <h2>Apagar representante</h2>
        <p>Tem certeza que deseja apagar este representante?</p>
        <p>
            <em>
                <b>ID:</b> {{ $representante->id }}
                <br>
                <b>Nome:</b> {{ $representante->nome }}
                <br>
                <b>Função:</b> {{ $representante->funcao }}
                <br>
                <b>CPF:</b> {{ $representante->cpf }}
                <br>
                <b>Empresa:</b> {{ $representante->empresa->nome }}
            </em>
        </p>
        <form method="post" action="{{ route('representantes/apagar', $representante->id) }}" class="formExclusao">
            @method('delete')
            @csrf
            <button 
                type="button"
                onclick="fecharModal({{ $representante->id }}, 'Exclusao')">
                Cancelar
            </button>
            <button 
                type="submit">
                Excluir
            </button>
        </form>
    </div>
</div>