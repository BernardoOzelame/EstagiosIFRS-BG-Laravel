<div id="modalExclusao{{ $curso->id }}" class="modal">
    <div class="modal-conteudo">
        <span class="fechar" onclick="fecharModal({{ $curso->id }}, 'Exclusao')">&times;</span>
        <h2>Apagar curso</h2>
        <p>Tem certeza que deseja apagar este curso?</p>
        <p>
            <em>
                <b>ID:</b> {{ $curso->id }}
                <br>
                <b>Curso:</b> {{ $curso->nome }}
            </em>
        </p>
        <form method="post" action="{{ route('cursos/apagar', $curso->id) }}" class="formExclusao">
            @method('delete')
            @csrf
            <button 
                type="button"
                onclick="fecharModal({{ $curso->id }}, 'Exclusao')">
                Cancelar
            </button>
            <button 
                type="submit">
                Excluir
            </button>
        </form>
    </div>
</div>