<div class="container-fluid">
    <div class="container text-light">
        <h2>Editar autor</h2>
        <?php
        $idAutor = $_GET["idAutor"];
        $sql = "SELECT * FROM tbautores where idAutor = $idAutor";
        $rs = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_assoc($rs);
        ?>
        <form action="index.php?menu=atualizar-autor" method="post">
            <div class="mb-3">
                <label class="form-label" for="idAutor">ID</label>
                <input class="form-control" type="text" name="idAutor" id="idAutor" value="<?= $dados["idAutor"] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="nomeAutor">Nome</label>
                <input class="form-control" type="text" name="nomeAutor" id="nomeAutor" value="<?= $dados["nomeAutor"] ?>">
            </div>
            <div class="mb-5">
                <label class="form-label" for="nacionalidadeAutor">Nacionalidade</label>
                <input class="form-control" type="text" name="nacionalidadeAutor" id="nacionalidadeAutor"
                    value="<?= $dados["nacionalidadeAutor"] ?>">
            </div>
            <div class="d-grid gap-2 col-3 mx-auto">
                <input class="btn btn-primary" type="submit" value="Salvar">
            </div>
        </form>
    </div>
</div>