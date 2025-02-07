<div id="modalExclusao{{ $aluno->id }}" class="modal">
    <div class="modal-conteudo">
        <span class="fechar" onclick="fecharModal({{ $aluno->id }}, 'Exclusao')">&times;</span>
        <h2>Apagar aluno</h2>
        <p>Tem certeza que deseja apagar este aluno?</p>
        <p>
            <em>
                <b>ID:</b> {{ $aluno->id }}
                <br>
                <b>Nome:</b> {{ $aluno->nome }}
                <br>
                <b>Matrícula:</b> {{ $aluno->matricula }}
            </em>
        </p>
        <form method="post" action="{{ route('alunos/apagar', $aluno->id) }}" class="formExclusao">
            @method('delete')
            @csrf
            <button 
                type="button"
                onclick="fecharModal({{ $aluno->id }}, 'Exclusao')">
                Cancelar
            </button>
            <button 
                type="submit">
                Excluir
            </button>
        </form>
    </div>
</div>