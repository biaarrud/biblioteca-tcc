<div class="container-fluid text-light">
    <div class="container">
        <h2>inserir leitura</h2>
             <?php
                $isbn = strip_tags(mysqli_escape_string($conexao, $_POST["isbn"]));
                $titulo = strip_tags(mysqli_escape_string($conexao, $_POST["titulo"]));
                $sinopse = strip_tags(mysqli_escape_string($conexao, $_POST["sinopse"]));
                $idGeneroLeitura = strip_tags(mysqli_escape_string($conexao, $_POST["idGeneroLeitura"]));
                $idAutor = strip_tags(mysqli_escape_string($conexao, $_POST["idAutor"]));
                $idEditora = strip_tags(mysqli_escape_string($conexao, $_POST["idEditora"]));

                $sql = "INSERT INTO tbleituras (
                isbn, 
                tituloLeitura,
                sinopseLeitura,
                idGeneroLeitura,
                idAutor,
                idEditora) 
                VALUES(
                '$isbn',
                '$titulo',
                '$sinopse',
                '$idGeneroLeitura',
                '$idAutor',
                '$idEditora')";
                $rs = mysqli_query($conexao, $sql);
                if ($rs) {
                    echo "<p> Rgistro inserido com sucesso</p>";
                } else {
                    echo "<p>Erro ao inserir</p>";
                }
             ?>
    </div>
</div>