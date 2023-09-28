<div class="container-fluid">
    <div class="container text-light">
        <h2>Editar leitura</h2>
        <?php
        $idLeitura = $_GET["idLeitura"];
        $sql = "SELECT * FROM tbleituras where idLeitura = $idLeitura";
        $rs = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_assoc($rs);
        ?>
        <form action="index.php?menu=atualizar-leitura" method="post">
            <div class="mb-3">
                <label class="form-label" for="idLeitura">ID</label>
                <input class="form-control" type="text" name="idLeitura" id="idLeitura" value="<?= $dados["idLeitura"] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="isbn">ISBN</label>
                <input class="form-control" type="text" name="isbn" id="ibn" value="<?= $dados["isbn"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="tituloLeitura">Titulo</label>
                <input type="text" class="form-control" name="tituloLeitura" id="tituloLeitura" value="<?= $dados["tituloLeitura"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="sinopseLeitura">Sinopse</label>
                <input type="text" class="form-control" name="sinopseLeitura" id="sinopseLeitura" value="<?= $dados["sinopseLeitura"] ?>">
            </div>
            <div class="input-group mb-3" >
                <label class="input-group-text" for="idGeneroLeitura">Gênero</label>
                <select class="form-select" name="idGeneroLeitura" id="idGeneroLeitura">
                    <option value="">selecione um Gênero</option>
                    <?php
                    $sql = "SELECT * FROM tbgeneroleitura";
                    $rs = mysqli_query($conexao, $sql);
                    while ($dadosGen = mysqli_fetch_assoc($rs)) {
                        ?>
                        <option <?php echo ($dados["idGeneroLeitura"] == $dadosGen["idGeneroLeitura"]) ? "selected" : "" ?>
                            value="<?= $dadosGen["idGeneroLeitura"] ?>">
                            <?= $dadosGen["tituloGeneroLeitura"] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="input-group mb-3" >
                <label class="input-group-text" for="idAutor">Autor</label>
                <select class="form-select" name="idAutor" id="idAutor">
                    <option value="">selecione um Autor</option>
                    <?php
                    $sql = "SELECT * FROM tbautores";
                    $rs = mysqli_query($conexao, $sql);
                    while ($dadosAut = mysqli_fetch_assoc($rs)) {
                        ?>
                        <option <?php echo ($dados["idAutor"] == $dadosAut["idAutor"]) ? "selected" : "" ?>
                            value="<?= $dadosAut["idAutor"] ?>">
                            <?= $dadosAut["nomeAutor"] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="input-group mb-5">
                <label class="input-group-text" for="idEditora">Editora</label>
                <select class="form-select" name="idEditora" id="idEditora">
                    <option value="">selecione um Editora</option>
                    <?php
                    $sql = "SELECT * FROM tbeditoras";
                    $rs = mysqli_query($conexao, $sql);
                    while ($dadosEdit = mysqli_fetch_assoc($rs)) {
                        ?>
                        <option <?php echo ($dados["idEditora"] == $dadosEdit["idEditora"]) ? "selected" : "" ?>
                            value="<?= $dadosEdit["idEditora"] ?>">
                            <?= $dadosEdit["nomeFantasia"] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="d-grid gap-2 col-3 mx-auto">
                <input class="btn btn-primary" type="submit" value="atualizar">
            </div>
        </form>
    </div>
</div>