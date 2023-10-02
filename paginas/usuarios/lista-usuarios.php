<div class="container-fluid">
    <div class="container text-light">
        <header>
            <h2>Usuários</h2>
        </header>
        <div class="btn btn-primary mb-2">
            <a class="text-decoration-none text-light" href="index.php?menu=cad-usuario">Novo Usuário
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
            <div class="input-group">
                <div class="input-group-text">Pesquisar</div>
                <input class="form-control" type="search" name="txtPesquisa" id="txtPesquisa"
                    value="<?= $txtPesquisa ?>">
                <button type="submit" class="btn btn-secondary">
                    <i class="ph ph-magnifying-glass"></i>
                </button>
            </div>
        </form>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Data de Admissão</th>
                    <th>editar</th>
                    <th>apagar</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT loginUsuario, nomeUsuario, date_format(dataAdmissaoUsuario, '%d/%m/%y') as dataAdmissaoUsuario, telefoneUsuario, emailUsuario FROM tbusuarios where nomeUsuario like '%{$txtPesquisa}%'";
            $rs = mysqli_query($conexao, $sql)
                or die("erro ao executar") . mysqli_error($conexao);
            while ($dados = mysqli_fetch_assoc($rs)) {
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $dados["nomeUsuario"] ?>
                        <td>
                            <?= $dados["emailUsuario"] ?>
                        </td>
                        <td>
                            <?= $dados["telefoneUsuario"] ?>
                        </td>
                        <td>
                            <?= $dados["dataAdmissaoUsuario"] ?>
                        </td>
                        <td>
                            <a class="btn btn-primary"
                                href="index.php?menu=editar-usuario&loginUsuario=<?= $dados["loginUsuario"] ?>">
                                <i class="ph ph-pencil-line icone"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger"
                                href="index.php?menu=apagar-usuario&loginUsuario=<?= $dados["loginUsuario"] ?>">
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