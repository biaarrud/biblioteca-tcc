<header>
    <h2>Clientes</h2>
</header>
<div>
    <a href="index.php?menu=cad-cliente">Novo Cliente</a>
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

    <input type="search" name="txtPesquisa" id="txtPesquisa" value="<?= $txtPesquisa ?>">

    <button type="submit">
        <img src="img/lupa.png" width="12" alt="pesquisar">
    </button>
</form>
<table border="1">
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
            <th>editar</th>
            <th>apagar</th>
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
                    <a href="index.php?menu=editar-cliente&idCliente=<?= $dados["idCliente"] ?>">
                        <i class="ph ph-pencil-line icone"></i>
                    </a>
                </td>
                <td>
                    <a href="index.php?menu=apagar-cliente&idCliente=<?= $dados["idCliente"] ?>">
                        <i class="ph ph-trash icone"></i>
                    </a>
                </td>
            </tr>
        </tbody>
        <?php
    }
    ?>

</table>