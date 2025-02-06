document.getElementById('mostrarSenhaIcon').addEventListener('click', function() {
    var senhaInput = document.getElementById('password');
    var icon = document.getElementById('mostrarSenhaIcon');

    var tipo = senhaInput.getAttribute('type') === 'password' ? 'text' : 'password';
    senhaInput.setAttribute('type', tipo);

    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
});