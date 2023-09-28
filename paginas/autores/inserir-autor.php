<div class="container-fluid">
    <div class="container text-light">
        <h2>inserir cadastro de autor</h2>
            <?php
            $nomeAutor = $_POST["nomeAutor"];
            $nacionalidadeAutor = $_POST["nacionalidadeAutor"];

            $sql = "INSERT INTO tbautores (
            nomeAutor,
            nacionalidadeAutor
            )VALUES(
            '$nomeAutor',
            '$nacionalidadeAutor')";

            $rs = mysqli_query($conexao, $sql);
            if ($rs) {
                echo "<p> Rgistro inserido com sucesso</p>";
            } else {
                echo "<p>Erro ao inserir</p>";
            }
        ?>
    </div>
</div>