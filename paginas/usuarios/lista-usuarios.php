<div class="container-fluid">
    <div class="container text-light">
        <header>
            <h2>Usuários</h2>
        </header>
        <div class="btn btn-primary mb-3">
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
            <div class="input-group mb-5">
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
                    <th>Editar</th>
                </tr>
            </thead>
            <?php
            $quantidade = 10;
            $pagina = (isset($_GET["pagina"])) ? (int) $_GET["pagina"] : 1;
            $inicio = ($quantidade * $pagina) - $quantidade;
            $sql = "SELECT loginUsuario, nomeUsuario, date_format(dataAdmissaoUsuario, '%d/%m/%y') as dataAdmissaoUsuario, telefoneUsuario, emailUsuario FROM tbusuarios where nomeUsuario like '%{$txtPesquisa}%' limit $inicio, $quantidade";
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
                    </tr>
                </tbody>
                <?php
            }
            ?>
        </table>
        <?php
        $sqlTotal = "select idUsuario from tbusuarios";
        $qrTotal = mysqli_query($conexao, $sqlTotal);
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);
        echo "<div class='btn-group position-relative'>";
        echo '<a class="btn btn-outline-secondary" href="?menu=usuarios&pagina=1">primeira pagina</a>';
        for ($i = 1; $i <= $totalPagina; $i++) {
            if ($i == $pagina) {
                echo "<a class='btn btn-outline-secondary' href='#'>$i</a> ";
            } else {
                echo "<a class='btn btn-outline-secondary' href='index.php?menu=usuarios&pagina=$i'>$i</a> ";
            }
        }
        echo "<a class='btn btn-outline-secondary' href=\"?menu=usuarios&pagina=$totalPagina\">ultima pagina</a>";
        echo "</div>"
            ?>
    </div>
</div>