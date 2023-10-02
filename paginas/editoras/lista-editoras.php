<div class="container-fluid">
    <div class="container text-light">
        <header>
            <h2>
                Editoras
            </h2>
        </header>
        <div class="btn btn-primary mb-3">
            <a class="text-decoration-none text-light" href="index.php?menu=cad-editora">
                Nova Editora
            <i class="ph ph-plus"></i>
            </a>
        </div>
        <div>
            <?php
            if (isset($_POST["txtPesquisa"])) {
                $txtPesquisa = $_POST["txtPesquisa"];
            } else {
                $txtPesquisa = "";
            }
            ?>
        </div>
        <form action="" method="post">
            <div class="input-group mb-5">
                <label for="" class="input-group-text">Pesquisar</label>       
                <input class="form-control" type="search" name="txtPesquisa" id="txtPesquisa" value="<?= $txtPesquisa ?>">
                <button class="btn btn-secondary" type="submit">
                <i class="ph ph-magnifying-glass"></i>
                </button>
            </div>
        </form>
        <table class="table table-dark table-hover" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CNPJ</th>
                    <th>Razão Social</th>
                    <th>Nome Fantasia</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT * FROM tbeditoras WHERE nomeFantasia like '%{$txtPesquisa}%'";
            $rs = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_assoc($rs)) {
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $dados["idEditora"] ?>
                        </td>
                        <td>
                            <?= $dados["cnpjEditora"] ?>
                        </td>
                        <td>
                            <?= $dados["razaoSocialEditora"] ?>
                        </td>
                        <td>
                            <?= $dados["nomeFantasia"] ?>
                        </td>
                        <td>
                            <?= $dados["enderecoEditora"] ?>
                        </td>
                        <td>
                            <?= $dados["bairroEditora"] ?>
                        </td>
                        <td>
                            <?= $dados["cidadeEditora"] ?>
                        </td>
                        <td>
                            <?= $dados["estadoEditora"] ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="index.php?menu=editar-editora&idEditora=<?= $dados["idEditora"] ?>">
                                <i class="ph ph-pencil-line icone"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="index.php?menu=apagar-editora&idEditora=<?= $dados["idEditora"] ?>">
                                <i class="ph ph-trash icone"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php
            }
            ?>
        </table>
    </div>
</div>