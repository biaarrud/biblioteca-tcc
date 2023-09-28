<div class="container-fluid">
    <div class="container text-light">
        <h2>Atualizar registro do autor</h2>
            <?php
            $idAutor = $_POST["idAutor"];
            $nomeAutor = $_POST["nomeAutor"];
            $nacionalidadeAutor = $_POST["nacionalidadeAutor"];

            $sql = "UPDATE tbautores SET
            nomeAutor = '{$nomeAutor}',
            nacionalidadeAutor = '{$nacionalidadeAutor}'
            WHERE idAutor = '{$idAutor}'";

            $rs = mysqli_query($conexao, $sql);
            echo "<p>registro atualizado</p>";
            ?>
    </div>
</div>