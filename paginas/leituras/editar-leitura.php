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
            <div class="row mb-3">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="idLeitura">ID</label>
                        <input type="text" id="idLeitura" name="idLeitura" value="<?= $dados["idLeitura"] ?>" readonly
                            class="form-control" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="isbn">ISBN</label>
                        <input type="text" id="isbn" class="form-control" name="isbn" value="<?= $dados["isbn"] ?>">
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <label class="form-label" for="tituloLeitura">Titulo</label>
                <input type="text" class="form-control" name="tituloLeitura" id="tituloLeitura"
                    value="<?= $dados["tituloLeitura"] ?>">
            </div>
            <div class="row mb-5">
                <div class="col">
                    <div class="form-outline">
                        <div class="input-group">
                            <label for="statusLeitura" class="input-group-text">Status</label>
                            <select name="statusLeitura" id="statusLeitura" class="form-select">
                                <?php
                                $sql = "SELECT *,
                                    CASE 
                                        WHEN statusLeitura = 1 THEN 'Disponível'
                                        WHEN statusLeitura = 0 THEN 'Emprestado'
                                        WHEN statusLeitura = 2 THEN 'Indisponível'
                                    END AS statusLeitura
                                     from tbleituras";
                                $rs = mysqli_query($conexao, $sql);
                                while ($dadosStts = mysqli_fetch_assoc($rs)) {
                                    ?>
                                    <option value="<?= $dadosStts["statusLeitura"] ?>">
                                        <?= $dadosStts["statusLeitura"] ?>
                                    </option>
                                    <option value="1">Disponível</option>
                                    <option value="2">Indisponível</option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <div class="input-group">
                            <label class="input-group-text" for="idGeneroLeitura">Gênero</label>
                            <select class="form-select" name="idGeneroLeitura" id="idGeneroLeitura">
                                <option value="">Selecione um gênero</option>
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
                    </div>
                </div>

            </div>
            <div class="row mb-5">
                <div class="col">
                    <div class="form-outline">                        
                        <div class="input-group">
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
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">                       
                        <div class="input-group mb-3">
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
                    </div>
                </div>

            </div>
            <div class="mb-5">
                <label class="form-label" for="sinopseLeitura">Sinopse</label>
                <textarea class="form-control" name="sinopseLeitura" id="sinopseLeitura" cols="30"
                    rows="10"><?= $dados["sinopseLeitura"] ?></textarea>
            </div>
            <div class="d-grid gap-2 col-3 mx-auto">
                <input class="btn btn-primary" type="submit" value="Salvar">
            </div>
        </form>
    </div>

</div>