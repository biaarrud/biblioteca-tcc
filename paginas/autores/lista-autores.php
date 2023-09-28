<div class="container-fluid">
    <div class="container text-light">
        <header>
            <h2>
                Autores
            </h2>
        </header>
        <div class="btn btn-primary mb-3" >
            <a class="text-decoration-none text-light" href="index.php?menu=cad-autor">
                Novo autor
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
            <div class="input-group mb-3">
                <label class="input-group-text" for="txtPesquisa">Pesquisar</label>
                <input class="form-control" type="search" name="txtPesquisa" id="txtPesquisa" value="<?= $txtPesquisa ?>">
                <button class="btn btn-secondary" type="submit">
                <i class="ph ph-magnifying-glass"></i>
                </button>
            </div>
        </form>
        <table class="table table-dark table-hover" >
            <thead>
                <tr>
                    <th>Id autor</th>
                    <th>Nome</th>
                    <th>Nacionalidade</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT * FROM tbautores where nomeAutor or nacionalidadeAutor like '%{$txtPesquisa}%'";
            $rs = mysqli_query($conexao, $sql)
                or die("erro ao executar") . mysqli_error($conexao);
            while ($dados = mysqli_fetch_assoc($rs)) {

                ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $dados["idAutor"] ?>
                        </td>
                        <td>
                            <?= $dados["nomeAutor"] ?>
                        </td>
                        <td>
                            <?= $dados["nacionalidadeAutor"] ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="index.php?menu=editar-autor&idAutor=<?= $dados["idAutor"] ?>">
                                <i class="ph ph-pencil-line icone"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="index.php?menu=apagar-autor&idAutor=<?= $dados["idAutor"] ?>">
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