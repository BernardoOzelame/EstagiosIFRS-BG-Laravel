<div id="modalVisualizacao{{ $aluno->id }}" class="modal">
    <div class="modal-conteudo">
        <span class="fechar" onclick="fecharModal({{ $aluno->id }}, 'Visualizacao')">&times;</span>
        <h2>Detalhes sobre {{ explode(' ', $aluno->nome)[0] }}</h2>
        <p>
            <b>Nome:</b> <i>{{ $aluno->nome }}</i>
            <br>
            <b>Matrícula:</b> <i>{{ $aluno->matricula }}</i>
            <br>
            <b>Curso:</b> <i>{{ $aluno->curso->nome }}</i>
            <br>
            <b>CPF:</b> <i>{{ $aluno->cpf }}</i>
            <br>
            <b>E-mail:</b> <i>{{ $aluno->email }}</i>
            <br>
            <b>Celular:</b> <i>{{ $aluno->telefoneCelular }}</i>
            <br>
            <b>Endereço:</b> <i>{{ $aluno->endereco }}</i>
            <br>
            <b>Cidade:</b> <i>{{ $aluno->cidade->nome }}</i>
            <br>
            <b>Ano que realiza estágio:</b> <i>{{ $aluno->anoEstagio }}</i>
            <br>
            <i>*{{ $aluno->finalizouCurso == 1 ? 'Aluno já finalizou o curso' : 'Aluno ainda não finalizou o curso' }}</i>
            <br>
            @if ($aluno->finalizou2Ano != 1)<i>*Aluno ainda não finalizou o 2º ano</i>@endif
        </p>
    </div>
</div>