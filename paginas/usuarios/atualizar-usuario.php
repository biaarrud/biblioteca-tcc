<div class="container-fluid">
    <div class="container text-light">
        <header>
            <h2>Atualizar Usuário</h2>
        </header>
        <?php
        $loginUsuario = strip_tags(mysqli_escape_string($conexao, $_POST["loginUsuario"]));
        $nomeUsuario = strip_tags(mysqli_escape_string($conexao, $_POST["nomeUsuario"]));
        $dataAdmissaoUsuario = strip_tags(mysqli_escape_string($conexao, $_POST["dataAdmissaoUsuario"]));
        $telefoneUsuario = strip_tags(mysqli_escape_string($conexao, $_POST["telefoneUsuario"]));
        $senhaUsuario = strip_tags(mysqli_escape_string($conexao, $_POST["senhaUsuario"]));
        $emailUsuario = strip_tags(mysqli_escape_string($conexao, $_POST["emailUsuario"]));

        $sql = "UPDATE tbusuarios set
        loginUsuario = '{$loginUsuario}',
        nomeUsuario = '{$nomeUsuario}',
        dataAdmissaoUsuario = '{$dataAdmissaoUsuario}',
        telefoneUsuario = '{$telefoneUsuario}',
        senhaUsuario = '{$senhaUsuario}',
        emailUsuario = '{$emailUsuario}' where loginUsuario = '{$loginUsuario}'";
        $rs = mysqli_query($conexao, $sql);
        echo "<p>Registro Atualizado</p>";
        ?>
    </div>
</div>