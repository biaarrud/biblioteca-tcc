<div class="container-fluid">
    <div class="container text-light">
        <header>
            <h2>Inserir Editora</h2>
        </header>
        <?php
        $cnpjEditora = strip_tags(mysqli_escape_string($conexao, $_POST["cnpjEditora"]));
        $razaoSocialEditora = strip_tags(mysqli_escape_string($conexao, $_POST["razaoSocialEditora"]));
        $nomeFantasia = strip_tags(mysqli_escape_string($conexao, $_POST["nomeFantasia"]));
        $enderecoEditora = strip_tags(mysqli_escape_string($conexao, $_POST["enderecoEditora"]));
        $bairroEditora = strip_tags(mysqli_escape_string($conexao, $_POST["bairroEditora"]));
        $cidadeEditora = strip_tags(mysqli_escape_string($conexao, $_POST["cidadeEditora"]));
        $estadoEditora = strip_tags(mysqli_escape_string($conexao, $_POST["estadoEditora"]));

        $sql = "INSERT INTO tbeditoras (
        cnpjEditora,
        razaoSocialEditora,
        nomeFantasia,
        enderecoEditora,
        bairroEditora,
        cidadeEditora,
        estadoEditora
        )VALUES(
        '{$cnpjEditora}',
        '{$razaoSocialEditora}',
        '{$nomeFantasia}',
        '{$enderecoEditora}',
        '{$bairroEditora}',
        '{$cidadeEditora}',
        '{$estadoEditora}')";

        $rs = mysqli_query($conexao, $sql);
        if ($rs) {
            echo "<p> Rgistro inserido com sucesso</p>";
        } else {
            echo "<p>Erro ao inserir</p>";
        }
        ?>
    </div>
</div>