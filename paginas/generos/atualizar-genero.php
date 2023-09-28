<div class="container-fluid">
    <div class="container text-light">
        <h2>Atualizar registro de gênero</h2>
            <?php
            $idGeneroLeitura = $_POST["idGeneroLeitura"];
            $tituloGeneroLeitura = $_POST["tituloGeneroLeitura"];
            $descricaGeneroLeitura = $_POST["descricaoGeneroLeitura"];

            $sql = "UPDATE tbgeneroleitura SET
            tituloGeneroLeitura = '{$tituloGeneroLeitura}',
            descricaoGeneroLeitura = '{$descricaGeneroLeitura}'
            WHERE idGeneroLeitura = '{$idGeneroLeitura}'";

            $rs = mysqli_query($conexao, $sql);
            echo "<p>Registro atualizado</p>";
            ?>
    </div>
</div>