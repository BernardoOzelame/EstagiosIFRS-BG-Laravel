<div id="modalVisualizacao{{ $empresa->id }}" class="modal">
    <div class="modal-conteudo">
        <span class="fechar" onclick="fecharModal({{ $empresa->id }}, 'Visualizacao')">&times;</span>
        <h2>Detalhes sobre {{ explode(' ', $empresa->nome)[0] }}</h2>
        <p>
            <b>ID: </b> <i>{{ $empresa->id }}</i>
            <br>
            <b>Nome:</b> <i>{{ $empresa->nome }}</i>
            <br>
            <b>CNPJ:</b> <i>{{ $empresa->cnpj }}</i>
            <br>
            <b>Número do convênio:</b> <i>{{ $empresa->numConvenio }}</i>
            <br>
            <b>Celular:</b> <i>{{ $empresa->telefoneCelular }}</i>
            <br>
            <b>E-mail:</b> <i>{{ $empresa->email }}</i>
            <br>
            <b>Área:</b> <i>{{ $empresa->area->nome }}</i>
            <br>
            <b>Endereço:</b> <i>{{ $empresa->endereco }}</i>
            <br>
            <b>Cidade:</b> <i>{{ $empresa->cidade->nome }}</i>
            <br>
        </p>
    </div>
</div>