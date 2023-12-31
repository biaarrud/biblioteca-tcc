<?php
include("./db/conexao.php");
session_start();
if (isset($_SESSION["loginUsuario"]) and isset($_SESSION["senhaUsuario"])) {
    $loginUsuario = $_SESSION["loginUsuario"];
    $senhaUsuario = $_SESSION["senhaUsuario"];
    $nomeUsuario = $_SESSION["nomeUsuario"];

    $sql = "SELECT * FROM tbusuarios WHERE loginUsuario = '{$loginUsuario}' and senhaUsuario = '{$senhaUsuario}'";
    $rs = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($rs);
    $linha = mysqli_num_rows($rs);

    if ($linha == 0) {
        session_unset();
        session_destroy();
        header('Location:  paginas/login/login.php');
        exit();
    }
} else {
    header('Location:  paginas/login/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" type="imagex/png" href="img/book-open.png">
    <title>Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <header class="bg-dark">
        <nav class="navbar navbar-expand-lg bg-secondary">
            <div class="container-fluid bg-secondary">
                <a class="navbar-brand text-light" href="index.php">ShelfLife</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page"
                                href="index.php?menu=home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php?menu=emprestimos">Empréstimos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php?menu=leituras">Leituras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php?menu=generos">Gêneros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php?menu=autores">Autores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php?menu=editoras">Editoras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php?menu=usuarios">Usuários</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php?menu=clientes">Clientes</a>
                        </li>
                    </ul>
                    <div class="text-dark">
                        <a href="paginas/login/logout.php" class="nav-link">
                            <i class="bi bi-person-fill"></i>
                            <?= $nomeUsuario ?> sair <i class="ph ph-sign-out"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php
        $menu = (isset($_GET["menu"])) ? $_GET["menu"] : "home";
        switch ($menu) {
            case "Home":
                include("paginas/home/home.php");
                break;
            case "emprestimos":
                include("paginas/emprestimos/emprestimos.php");
                break;
            case "leituras":
                include("paginas/leituras/leituras.php");
                break;
            case "cad-leitura":
                include("paginas/leituras/cad-leitura.php");
                break;
            case 'inserir-leitura':
                include("paginas/leituras/inserir-leitura.php");
                break;
            case 'editar-leitura':
                include("paginas/leituras/editar-leitura.php");
                break;
            case 'atualizar-leitura':
                include("paginas/leituras/atualizar-leitura.php");
                break;
            case 'generos':
                include("paginas/generos/generos.php");
                break;
            case 'editar-genero':
                include("paginas/generos/editar-genero.php");
                break;
            case 'atualizar-genero':
                include("paginas/generos/atualizar-genero.php");
                break;
            case 'cad-genero':
                include("paginas/generos/cad-genero.php");
                break;
            case 'inserir-genero':
                include("paginas/generos/inserir-genero.php");
                break;
            case 'autores':
                include("paginas/autores/lista-autores.php");
                break;
            case 'cad-autor':
                include("paginas/autores/cad-autor.php");
                break;
            case 'inserir-autor':
                include("paginas/autores/inserir-autor.php");
                break;
            case 'editar-autor':
                include("paginas/autores/editar-autor.php");
                break;
            case 'atualizar-autor':
                include("paginas/autores/atualizar-autor.php");
                break;
            case 'clientes':
                include("paginas/clientes/lista-cliente.php");
                break;
            case 'cad-cliente':
                include("paginas/clientes/cad-cliente.php");
                break;
            case 'inserir-cliente':
                include("paginas/clientes/inserir-cliente.php");
                break;
            case 'editar-cliente':
                include("paginas/clientes/editar-cliente.php");
                break;
            case 'atualizar-cliente':
                include("paginas/clientes/atualizar-cliente.php");
                break;
            case 'editoras':
                include("paginas/editoras/lista-editoras.php");
                break;
            case 'cad-editora':
                include("paginas/editoras/cad-editora.php");
                break;
            case 'inserir-editora':
                include("paginas/editoras/inserir-editora.php");
                break;
            case 'editar-editora':
                include("paginas/editoras/editar-editora.php");
                break;
            case 'atualizar-editora':
                include("paginas/editoras/atualizar-editora.php");
                break;
            case 'usuarios':
                include("paginas/usuarios/lista-usuarios.php");
                break;
            case 'cad-usuario':
                include("paginas/usuarios/cad-usuario.php");
                break;
            case 'inserir-usuario':
                include("paginas/usuarios/inserir-usuario.php");
                break;
            case 'editar-usuario':
                include("paginas/usuarios/editar-usuario.php");
                break;
            case 'atualizar-usuario':
                include("paginas/usuarios/atualizar-usuario.php");
                break;
            default:
                include("paginas/home/home.php");
                break;
        }
        ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.form.js"></script>
    <script src="./js/upload.js"></script>
    <footer>
    </footer>
</body>

</html>