<div class="container-fluid">
    <div class="container text-light">
        <h2>Gêneros</h2>
        <div class="btn btn-primary mb-3">
            <a class="text-decoration-none text-light" href="index.php?menu=cad-genero">Novo gênero
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
        <div class="mb-3">
            <form action="" method="post">
                <div class="input-group">
                    <label class="input-group-text" for="">Pesquisar</label>
                    <input type="search" class="form-control" name="txtPesquisa" id="txtPesquisa" value="<?= $txtPesquisa ?>">
                    <button class="btn btn-secondary" type="submit">
                    <i class="ph ph-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT * FROM tbgeneroleitura WHERE tituloGeneroLeitura LIKE '%{$txtPesquisa}%'";
            $rs = mysqli_query($conexao, $sql) or die("erro ao executar") . mysqli_error();
            while ($dados = mysqli_fetch_assoc($rs)) {
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $dados["idGeneroLeitura"] ?>
                        </td>
                        <td>
                            <?= $dados["tituloGeneroLeitura"] ?>
                        </td>
                        <td>
                            <?= $dados["descricaoGeneroLeitura"] ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="index.php?menu=editar-genero&idGeneroLeitura=<?= $dados["idGeneroLeitura"] ?>">
                                <i class="ph ph-pencil-line icone"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="index.php?menu=apagar-genero&idGeneroLeitura=<?= $dados["idGeneroLeitura"] ?>">
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