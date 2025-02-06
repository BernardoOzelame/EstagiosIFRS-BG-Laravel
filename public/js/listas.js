document.getElementById("pesquisa").addEventListener("input", function () {
    var valorPesquisa = this.value.toLowerCase();
    var tabela = document.querySelectorAll("#tabela tbody tr");
    var mensagemNenhumResultado = document.getElementById("nenhumResultado");

    var resultadosEncontrados = false;

    tabela.forEach(function (tr) {
        var encontrou = false;
        tr.querySelectorAll('td').forEach(function (td) {
            if (td.textContent.toLowerCase().indexOf(valorPesquisa) > -1) {
                encontrou = true;
            }
        });
        tr.style.display = encontrou ? "" : "none";
        resultadosEncontrados = resultadosEncontrados || encontrou;
    });

    if (resultadosEncontrados) {
        document.getElementById("tabela").style.display = "";
        mensagemNenhumResultado.style.display = "none";
    } else {
        document.getElementById("tabela").style.display = "none";
        mensagemNenhumResultado.style.display = "block";
    }
});

function abrirModal(id, tipo) {
    const modal = document.getElementById(`modal${tipo}${id}`);
    if (modal) {
        modal.style.display = "block";
    }
}

function fecharModal(id, tipo) {
    const modal = document.getElementById(`modal${tipo}${id}`);
    if (modal) {
        modal.style.display = "none";
    }
}

window.onclick = function(event) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
};