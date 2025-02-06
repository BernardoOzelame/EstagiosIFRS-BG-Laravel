<header>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
</header>

<div id="mainContent" class="content">
    <div class="header">
        <i id="toggleBtn" class="icone fa-solid fa-bars" style="color: #f1f1f1;" onclick="toggleMenu()"></i>
        <img src="{{ asset('imgs/logoIFRSBranca.png') }}" alt="Logotipo do IFRS" id="imgLogo">
        <span class="greeting">Olá, {{ Auth::user()['nome'] }}!</span>
    </div>
</div>

<div class="sidebarMenu">
    <i class="fas fa-times close-btn icone2"  style="color: #44A64A;" onclick="toggleMenu()"></i>
    <ul class="menu">
        <li>
            <a href="{{ route('estagios') }}" onclick="toggleMenu()">Página Inicial</a>
        </li>
        <li>
            <a href="infosEstagio.php" onclick="toggleMenu()">Informações Gerais</a>
        </li>
        <li>
            <a href="{{ route('alunos') }}" onclick="toggleMenu()">Alunos</a>
        </li>
        <li>
            <a href="professores.php" onclick="toggleMenu()">Professores</a>
        </li>
        <li>
            <a href="notasEstagio.php" onclick="toggleMenu()">Notas</a>
        </li>
        <li>
            <a href="cursos.php" onclick="toggleMenu()">Cursos</a>
        </li>
        <li>
            <a href="{{ route('areas') }}" onclick="toggleMenu()">Áreas</a>
        </li>
        <li>
            <a href="{{ route('cidades') }}" onclick="toggleMenu()">Cidades</a>
        </li>
        <li>
            <a href="supervisores.php" onclick="toggleMenu()">Supervisores</a>
        </li>
        <li>
            <a href="representantes.php" onclick="toggleMenu()">Representantes</a>
        </li>
        <li>
            <a href="empresas.php" onclick="toggleMenu()">Empresas</a>
        </li>
        <li>
            <a href="documentos.php" onclick="toggleMenu()">Documentos</a>
        </li>
        <li>
            <a href="{{ route('usuarios') }}" onclick="toggleMenu()">Usuários</a>
        </li>
        <li class="sair">
            <a id="sairA" href="{{ route('logout') }}" onclick="toggleMenu()"><i class="fa-regular fa-circle-left sairI" style="color: #f0f0f0;"></i>Sair</a>
        </li>
    </ul>
</div>

<script>
    function toggleMenu() {
        var sidebar = document.querySelector('.sidebarMenu');
        sidebar.style.width = sidebar.style.width === '250px' ? '0' : '250px';
    }
</script>