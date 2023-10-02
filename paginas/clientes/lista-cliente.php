<div class="container-fluid">
    <div class="container text-light">
        <header>
            <h2>Clientes</h2>
        </header>
        <div class="btn btn-primary mb-2">
            <a class="text-decoration-none text-light" href="index.php?menu=cad-cliente">
                Novo Cliente
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
                <label class="input-group-text" for="txtPesquisa">Pesquisar</label>
                <input class="form-control" type="search" name="txtPesquisa" id="txtPesquisa" value="<?= $txtPesquisa ?>">
                <button class="btn btn-secondary" type="submit">
                <i class="ph ph-magnifying-glass"></i>
                </button>
            </div>
        </form>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Id Usuário</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT * FROM tbclientes where nomeCliente like '%{$txtPesquisa}%'";
            $rs = mysqli_query($conexao, $sql)
                or die("erro ao executar") . mysqli_error($conexao);
            while ($dados = mysqli_fetch_assoc($rs)) {
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $dados["idCliente"] ?>
                        </td>
                        <td>
                            <?= $dados["nomeCliente"] ?>
                        </td>
                        <td>
                            <?= $dados["emailCliente"] ?>
                        </td>
                        <td>
                            <?= $dados["cpfCliente"] ?>
                        </td>
                        <td>
                            <?= $dados["telefoneCliente"] ?>
                        </td>
                        <td>
                            <?= $dados["enderecoCliente"] ?>
                        </td>
                        <td>
                            <?= $dados["bairroCliente"] ?>
                        </td>
                        <td>
                            <?= $dados["cidadeCliente"] ?>
                        </td>
                        <td>
                            <?= $dados["estadoCliente"] ?>
                        </td>

                        <td>
                            <a class="btn btn-primary" href="index.php?menu=editar-cliente&idCliente=<?= $dados["idCliente"] ?>">
                                <i class="ph ph-pencil-line icone"></i>
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