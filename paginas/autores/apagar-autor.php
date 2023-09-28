<div class="container-fluid">
    <div class="container text-light">
        <h2>Apagar autor</h2>
            <?php
            $idAutor = $_GET["idAutor"];
            $sql = "DELETE FROM tbautores WHERE idAutor = '{$idAutor}'";
            $rs = mysqli_query($conexao, $sql) or die("nao foi possivel excluir" . mysqli_error());

            echo "<p> Registro apagado com sucesso </p>"
            ?>
    </div>
</div>