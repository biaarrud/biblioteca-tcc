<?php
    include "..\..\db\conexao.php";

    $msg_error ="";

    if (isset($_POST["loginUsuario"])  && isset($_POST["senhaUsuario"]) ){
        $loginUsuario = mysqli_escape_string($conexao, $_POST ["loginUsuario"]);
        $senhaUsuario = hash('sha256',  $_POST["senhaUsuario"]);

        $sql = "SELECT * FROM tbusuarios WHERE loginUsuario = '{$loginUsuario}' and senhaUsuario = '{$senhaUsuario}'";
        $rs = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_assoc($rs);
        $linha = mysqli_num_rows($rs);

        if ($linha != 0) {
            session_start();
            $_SESSION["loginUsuario"] = $loginUsuario;
            $_SESSION["senhaUsuario"] = $senhaUsuario;
            $_SESSION["nomeUsuario"] = $dados["nomeUsuario"];

            header('Location: ../../index.php');
        } else {
            $msg_error = "<div class = 'alert alert-danger mt-3'>
            <p> usuario não encontrado ou senha não confere</p>
            </div>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>login</title>
</head>

<body class="bg-secondary">
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 p-4 bg-white shadow rounded">
                <div class="row justify-content-center mb-4">
                    SHELFLIFE
                </div>
                <form action="login.php" class="needs-validation" method="post" novalidate>
                    <div class="form-group mb-4">
                        <label class="form-label" for="loginUsuario">Login</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input class="form-control" type="text" name="loginUsuario" id="loginUsuario" required>
                            <div class="invalid-feedback">
                                informe seu login
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" for="senhaUsuario">Senha</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-key-fill"></i>
                            </span>
                            <input class="form-control" type="password" name="senhaUsuario" id="senhaUsuario" required>
                            <div class="invalid-feedback">
                                informe sua senha
                            </div>
                        </div>
                        <?php
                        echo $msg_error;
                        ?>
                    </div>
                    <button class="btn btn-success w-100">
                        <i class="bi bi-box-arrow-in-right"></i>
                        entrar
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="../../js/validation.js"></script>
</body>

</html>