<div class="container-fluid">
    <div class="container text-light">
        <header>
            <h2>Atualizar editora</h2>
        </header>
        <?php
        $idEditora = strip_tags(mysqli_escape_string($conexao, $_POST["idEditora"]));
        $cnpjEditora = strip_tags(mysqli_escape_string($conexao, $_POST["cnpjEditora"]));
        $razaoSocialEditora = strip_tags(mysqli_escape_string($conexao, $_POST["razaoSocialEditora"]));
        $nomeFantasia = strip_tags(mysqli_escape_string($conexao, $_POST["nomeFantasia"]));
        $enderecoEditora = strip_tags(mysqli_escape_string($conexao, $_POST["enderecoEditora"]));
        $bairroEditora = strip_tags(mysqli_escape_string($conexao, $_POST["bairroEditora"]));
        $cidadeEditora = strip_tags(mysqli_escape_string($conexao, $_POST["cidadeEditora"]));
        $estadoEditora = strip_tags(mysqli_escape_string($conexao, $_POST["estadoEditora"]));

        $sql = "UPDATE tbeditoras SET
        cnpjEditora = '{$cnpjEditora}',
        razaoSocialEditora ='{$razaoSocialEditora}',
        nomeFantasia = '{$nomeFantasia}',
        enderecoEditora = '{$enderecoEditora}',
        bairroEditora = '{$bairroEditora}',
        cidadeEditora = '{$cidadeEditora}',
        estadoEditora = '{$estadoEditora}'
        WHERE idEditora = '{$idEditora}'";

        $rs = mysqli_query($conexao, $sql);
        echo "<p>Registro atualizado</p>";
        ?>
    </div>
</div>