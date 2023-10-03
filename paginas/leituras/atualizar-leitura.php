<div class="container-fluid">
    <div class="container text-light">
        <h2>Atualizar Leitura</h2>
            <?php
            $isbn = strip_tags(mysqli_escape_string($conexao, $_POST["isbn"]));
            $idLeitura = strip_tags(mysqli_escape_string($conexao, $_POST["idLeitura"]));
            $tituloLeitura = strip_tags(mysqli_escape_string($conexao, $_POST["tituloLeitura"]));
            $sinopseLeitura = strip_tags(mysqli_escape_string($conexao, $_POST["sinopseLeitura"]));
            $idGeneroLeitura = strip_tags(mysqli_escape_string($conexao, $_POST["idGeneroLeitura"]));
            $idAutor = strip_tags(mysqli_escape_string($conexao, $_POST["idAutor"]));
            $idEditora = strip_tags(mysqli_escape_string($conexao, $_POST["idEditora"]));
            $statusLeitura = strip_tags(mysqli_escape_string($conexao, $_POST["statusLeitura"]));

            $sql = " UPDATE tbleituras SET
            isbn = '{$isbn}',
            tituloLeitura = '{$tituloLeitura}',
            sinopseLeitura = '{$sinopseLeitura}',
            idGeneroLeitura = '{$idGeneroLeitura}',
            idAutor = '{$idAutor}',
            statusLeitura = '{$statusLeitura}',
            idEditora = '{$idEditora}'
            WHERE idLeitura = '{$idLeitura}'";

            $rs = mysqli_query($conexao, $sql);
            echo "<p>regitro atualizado!</p>";
            ?>
    </div>
</div>