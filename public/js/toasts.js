setTimeout(function () {
    var alertElement = document.querySelector('.mensagem-sucesso');
    if (alertElement) {
        alertElement.style.transition = 'opacity 0.5s ease';
        alertElement.style.opacity = 0;
        setTimeout(() => alertElement.remove(), 500);
    }
}, 3500);