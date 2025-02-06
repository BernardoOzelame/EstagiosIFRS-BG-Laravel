document.addEventListener('DOMContentLoaded', function() {
    var selects = document.querySelectorAll('select');

    function verificarPrimeiraOption(select) {
        if (select.value === "-1") {
            select.classList.add('primeira-option-selecionada');
        } else {
            select.classList.remove('primeira-option-selecionada');
        }
    }

    selects.forEach(function(select) {
        verificarPrimeiraOption(select);
        select.addEventListener('change', function() {
            verificarPrimeiraOption(select);
        });
    });
});