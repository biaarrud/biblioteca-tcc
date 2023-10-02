<div class="container-fluid">
    <div class="container text-light">
        <h2>Editar gênero</h2>
        <?php
        $idGeneroLeitura = $_GET["idGeneroLeitura"];
        $sql = "SELECT * FROM tbgeneroleitura where idGeneroLeitura = $idGeneroLeitura";
        $rs = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_assoc($rs);
        ?>
        <form action="index.php?menu=atualizar-genero" method="post">
            <div class="mb-3">
                <label class="form-label" for="idGeneroLeitura">ID</label>
                <input class="form-control" type="text" name="idGeneroLeitura" id="idGeneroLeitura" value="<?= $dados["idGeneroLeitura"] ?>"
                    readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="tituloGeneroLeitura">Titulo</label>
                <input class="form-control" type="text" name="tituloGeneroLeitura" id="tituloGeneroLeitura"
                    value="<?= $dados["tituloGeneroLeitura"] ?>">
            </div>
            <div class="mb-5">
                <label class="form-label" for="descricaoGeneroLeitura">Descrição</label>
                <input class="form-control" type="text" name="descricaoGeneroLeitura" id="descricaoGeneroLeitura"
                    value="<?= $dados["descricaoGeneroLeitura"] ?>">
            </div>
            <div class="d-grid gap-2 col-3 mx-auto">
                <input class="btn btn-primary" type="submit" value="Salvar">
            </div>
        </form>
    </div>
</div>