<div class="container-fluid">
    <div class="container text-light">
        <header>
            <h2>Atualizar Cliente</h2>
        </header>
        <?php
        $idCliente = strip_tags(mysqli_escape_string($conexao, $_POST["idCliente"]));
        $nomeCliente = strip_tags(mysqli_escape_string($conexao, $_POST["nomeCliente"]));
        $emailCliente = strip_tags(mysqli_escape_string($conexao, $_POST["emailCliente"]));
        $cpfCliente = strip_tags(mysqli_escape_string($conexao, $_POST["cpfCliente"]));
        $telefoneCliente = strip_tags(mysqli_escape_string($conexao, $_POST["telefoneCliente"]));
        $enderecoCliente = strip_tags(mysqli_escape_string($conexao, $_POST["enderecoCliente"]));
        $bairroCliente = strip_tags(mysqli_escape_string($conexao, $_POST["bairroCliente"]));
        $cidadeCliente = strip_tags(mysqli_escape_string($conexao, $_POST["cidadeCliente"]));
        $estadoCliente = strip_tags(mysqli_escape_string($conexao, $_POST["estadoCliente"]));
        $statusCliente = strip_tags(mysqli_escape_string($conexao, $_POST["statusCliente"]));


        $sql = "UPDATE tbclientes SET
        nomeCliente = '{$nomeCliente}',
        emailCliente = '{$emailCliente}',
        cpfCliente = '{$cpfCliente}',
        telefoneCliente = '{$telefoneCliente}',
        enderecoCliente = '{$enderecoCliente}',
        bairroCliente = '{$bairroCliente}',
        cidadeCliente = '{$cidadeCliente}',
        estadoCliente = '{$estadoCliente}',
        statusCliente = '{$statusCliente}'
        WHERE idCliente = '{$idCliente}'";

        $rs = mysqli_query($conexao, $sql);
        echo "<p>Registro atualizado</p>";
        ?>
    </div>
</div>