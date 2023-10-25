<div class="container-fluid">
    <div class="container text-light">
        <header>
            <h2>Cadastro de leituras</h2>
        </header>
        <div>
            <form action="index.php?menu=inserir-leitura" method="post">
                <div class="alert alert-danger" role="alert">
                    Atenção! Não é possível excluir após inserção, apenas editar!
                </div>
                <div class="row mb-5">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="isbn">ISBN</label>
                            <input type="text" id="isbn" class="form-control" name="isbn">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="titulo">Título</label>
                            <input type="text" id="titulo" name="titulo" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="input-group mb-5">
                    <label class="input-group-text" for="idGeneroLeitura">Gênero</label>
                    <select class="form-select" name="idGeneroLeitura" id="idGeneroLeitura">
                        <option value="">Selecione um gênero</option>
                        <?php
                        $sql = "SELECT * FROM tbgeneroleitura";
                        $rs = mysqli_query($conexao, $sql);
                        while ($dados = mysqli_fetch_assoc($rs)) {
                            ?>
                            <option value="<?= $dados["idGeneroLeitura"] ?>">
                                <?= $dados["tituloGeneroLeitura"] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group mb-5">
                    <label class="input-group-text" for="idAutor">Autor</label>
                    <select class="form-select" name="idAutor" id="idAutor">
                        <option value="">Selecione um autor</option>
                        <?php
                        $sql = "SELECT * FROM tbautores";
                        $rs = mysqli_query($conexao, $sql);
                        while ($dados = mysqli_fetch_assoc($rs)) {
                            ?>
                            <option value="<?= $dados["idAutor"] ?>">
                                <?= $dados["nomeAutor"] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="idEditora">Editora</label>
                    <select class="form-select" name="idEditora" id="idEditora">
                        <option value="">Selecione uma editora</option>
                        <?php
                        $sql = "SELECT * FROM tbeditoras";
                        $rs = mysqli_query($conexao, $sql);
                        while ($dados = mysqli_fetch_assoc($rs)) {
                            ?>
                            <option value="<?= $dados["idEditora"] ?>">
                                <?= $dados["nomeFantasia"] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-5">
                    <label class="form-label" for="sinopse">Sinopse</label>
                    <textarea class="form-control" name="sinopse" cols="30" rows="5"></textarea>
                </div>
                <div class="d-grid gap-2 col-3 mx-auto">
                    <input class="btn btn-success" type="submit" value="Salvar">
                </div>
            </form>
        </div>
    </div>
</div>