<header>
    <h2>Usuários</h2>
</header>
<div>
    <a href="index.php?menu=cad-usuario">Novo Usuário</a>
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
                    <?=$dados["dataAdmissaoUsuario"]?>
                </td>
                <td>
                    <a href="index.php?menu=editar-usuario&loginUsuario=<?= $dados["loginUsuario"] ?>">
                        <i class="ph ph-pencil-line icone"></i>
                    </a>
                </td>
                <td>
                    <a href="index.php?menu=apagar-usuario&loginUsuario=<?= $dados["loginUsuario"] ?>">
                        <i class="ph ph-trash icone"></i>
                    </a>
                </td>
            </tr>
        </tbody>
        <?php
    }
    ?>

</table>