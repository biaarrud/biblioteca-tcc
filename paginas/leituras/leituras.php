<div class="container-fluid text-light">
    <div class="container">
        <header>
            <h2>
                Leituras
            </h2>
        </header>
        <div class="btn btn-primary mb-3">
            <a class="text-decoration-none text-light" href=" index.php?menu=cad-leitura">
                Nova leitura
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
                    <th></th>
                    <th>ID</th>
                    <th>ISBN</th>
                    <th>Título</th>
                    <th>Gênero</th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>Status</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <?php
            $quantidade = 10;
            $pagina = (isset($_GET["pagina"])) ? (int) $_GET["pagina"] : 1;
            $inicio = ($quantidade * $pagina) - $quantidade;
            $sql = "SELECT *,
            CASE
                WHEN statusLeitura = 1 THEN 'Disponível'
                WHEN statusLeitura = 0 THEN 'Emprestado'
                WHEN statusLeitura = 2 THEN 'Indisponível'
                END AS statusLeitura
            FROM tbleituras as l inner join tbgeneroleitura as g 
                on l.idGeneroLeitura = g.idGeneroLeitura
                inner join tbautores as a on l.idAutor = a.idAutor
                inner join tbeditoras as e on l.idEditora = e.idEditora 
                where l.tituloLeitura or g.tituloGeneroLeitura like '%{$txtPesquisa}%' limit $inicio, $quantidade";
            $rs = mysqli_query($conexao, $sql)
                or die("erro ao executar") . mysqli_error($conexao);
            while ($dados = mysqli_fetch_assoc($rs)) {
                ?>
                <tbody>
                    <tr>
                        <td>
                            <img width="70" height="100" src="./paginas/leituras/img-leitura/<?=$dados["imgLeitura"]?>"alt=""></td>
                        <td><?=$dados["idLeitura"]?></td>

                        <td><?=$dados["isbn"]?></td>

                        <td><?=$dados["tituloLeitura"]?></td>

                        <td><?=$dados["tituloGeneroLeitura"]?></td>

                        <td><?=$dados["nomeAutor"]?></td>
                        
                        <td><?=$dados["nomeFantasia"]?></td>

                        <td>
                            <?php
                            $bgStatusLeitura = "";
                            if ($dados["statusLeitura"] == "Disponível") {
                                $bgStatusLeitura = "text-bg-success";
                            } else if ($dados["statusLeitura"] == "Emprestado") {
                                $bgStatusLeitura = "text-bg-danger";
                            } else {
                                $bgStatusLeitura = "text-bg-warning";
                            }

                            ?>
                            <span class="badge <?= $bgStatusLeitura ?>">
                                <?= $dados["statusLeitura"] ?>
                            </span>
                        </td>
                        <td>
                            <a class="btn btn-primary"
                                href="index.php?menu=editar-leitura&idLeitura=<?= $dados["idLeitura"] ?>">
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
        $sqlTotal = "select idLeitura from tbleituras";
        $qrTotal = mysqli_query($conexao, $sqlTotal);
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);
        echo "<div class='btn-group position-relative'>";
        echo '<a class="btn btn-outline-secondary" href="?menu=leituras&pagina=1">primeira pagina</a>';
        for ($i = 1; $i <= $totalPagina; $i++) {
            if ($i == $pagina) {
                echo "<a class='btn btn-outline-secondary' href='#'>$i</a> ";
            } else {
                echo "<a class='btn btn-outline-secondary' href='index.php?menu=leituras&pagina=$i'>$i</a> ";
            }
        }
        echo "<a class='btn btn-outline-secondary' href=\"?menu=leituras&pagina=$totalPagina\">ultima pagina</a>";
        echo "</div>"
            ?>

    </div>
</div>