document.addEventListener('DOMContentLoaded', function() {
    const finalizouCursoSim = document.getElementById('finalizouCursoSim');
    const finalizouCursoNao = document.getElementById('finalizouCursoNao');
    const finalizou2AnoSim = document.getElementById('finalizou2AnoSim');
    const finalizou2AnoNao = document.getElementById('finalizou2AnoNao');

    function aplicarRegras() {
        if (finalizouCursoSim.checked) {
            finalizou2AnoNao.disabled = true;
            finalizou2AnoNao.checked = false;
        } else {
            finalizou2AnoNao.disabled = false;
        }

        if (finalizou2AnoNao.checked) {
            finalizouCursoSim.disabled = true;
            finalizouCursoSim.checked = false;
            finalizouCursoNao.checked = true;
        } else {
            finalizouCursoSim.disabled = false;
        }
    }
    aplicarRegras();
    finalizouCursoSim.addEventListener('change', aplicarRegras);
    finalizouCursoNao.addEventListener('change', aplicarRegras);
    finalizou2AnoSim.addEventListener('change', aplicarRegras);
    finalizou2AnoNao.addEventListener('change', aplicarRegras);
});