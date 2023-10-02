<header>
    <h2>Empréstimos</h2>
</header>
<?php
$idCliente = (isset($_GET["idCliente"])) ? $_GET["idCliente"] : 0;
$idEmprestimo = (isset($_GET["idEmprestimo"])) ? $_GET["idEmprestimo"] : 0;
$idLeitura = (isset($_GET["idLeitura"])) ? $_GET["idLeitura"] : 0;
$menuEmprestimos = (isset($_GET["menuEmprestimos"])) ? $_GET["menuEmprestimos"] : 0;
$dataDeEmprestimo = date('Y-m-d');

if (isset($_GET["dataDeDevolucao"])) {
    $dataDeDevolucao = $_GET['dataDeEntrega'];
} else {
    $dataDeDevolucao = date("Y-m-d", strtotime($dataDeEmprestimo . '+ 5 days'));
}

if ($menuEmprestimos === "addEmprestimo") {
    $sql = "INSERT INTO tbemprestimos (
        idCliente,
        dataEmprestimo,
        dataDevolucaoEmprestimo)
        VALUES(
            '{$idCliente}',
            '{$dataDeEmprestimo}',
            '{$dataDeDevolucao}'
        )";
    mysqli_query($conexao, $sql) or die("erro" . mysqli_error($conexao));
    $idEmprestimo = mysqli_insert_id($conexao);
    header('Location:index.php?menu=emprestimos&idCliente=' . $idCliente);
}

if ($menuEmprestimos === "addLeitura") {
    $sql = "INSERT INTO tblistaleiturasemprestadas (
        idEmprestimo,
        idLeitura,
        dataDeEntrega,
        statusEmprestimo)
        VALUES(
        '{$idEmprestimo}',
        '{$idLeitura}',
        '{$dataDeDevolucao}',
        1)";
    mysqli_query($conexao, $sql);

    $sql = "UPDATE tbleituras SET statusLeitura = 0 WHERE 
    idLeitura = '{$idLeitura}'";
    mysqli_query($conexao, $sql);
}
if ($menuEmprestimos === "removeleitura") {

    $sql = "DELETE FROM tblistaleiturasemprestadas WHERE idEmprestimo = '{$idEmprestimo}' and idLeitura = '{$idLeitura}'";
    mysqli_query($conexao, $sql);

    $sql = "UPDATE tbleituras SET statusLeitura = 1 WHERE idLeitura = '{$idLeitura}'";
    mysqli_query($conexao, $sql);
}

if ($menuEmprestimos === "baixaLeitura") {
    $sql = "UPDATE tblistaleiturasemprestadas set statusEmprestimo = 0
    WHERE idEmprestimo = '{$idEmprestimo}' AND idLeitura = '{$idLeitura}'";
    mysqli_query($conexao, $sql);

    $sql = "UPDATE tbleituras set statusLeitura = 1 WHERE idLeitura = '{$idLeitura}'";
    mysqli_query($conexao, $sql);
}

//baixa geral emprestimo
$sql = "SELECT * FROM tblistaleiturasemprestadas WHERE idEmprestimo = '{$idEmprestimo}'";
$rs = mysqli_query($conexao, $sql);
$linha = mysqli_num_rows($rs);
if ($linha > 0) {
    $sql = "SELECT * FROM tblistaleiturasemprestadas
    WHERE idEmprestimo = '{$idEmprestimo}' and statusEmprestimo = 1";
    $rs = mysqli_query($conexao, $sql);
    $linha = mysqli_num_rows($rs);
    if ($linha === 0) {
        $sql = "UPDATE tbemprestimos SET statusEntregaEmprestimo = 0 WHERE idEmprestimo = '{$idEmprestimo}'";
        mysqli_query($conexao, $sql);
    }
}
?>
<div class="container-fluid text-light">
    <div class="container">
        <form action="" method="get">
            <div class="mb-3">
                <input type="hidden" class="form-control" name="menu" value="emprestimos">
                <div class="input-group mb-5">
                    <label class="input-group-text" for="idCliente">Selecione um cliente</label>
                    <select class="form-select" name="idCliente" id="idCliente">
                        <option value="">Selecione</option>
                        <?php
                        $sql = "SELECT * FROM tbclientes where statusCliente = 1";
                        $rs = mysqli_query($conexao, $sql);
                        while ($dados = mysqli_fetch_assoc($rs)) {
                            ?>
                            <option <?php echo ($idCliente == $dados["idCliente"]) ? "selected" : "" ?>
                                value="<?= $dados['idCliente'] ?>">
                                <?= $dados['idCliente'] ?> -
                                <?= $dados['nomeCliente'] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                    <button type="submit" class="btn btn-secondary">
                        <i class="ph ph-magnifying-glass icone"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>
<?php
if ($idCliente > 0) {
    ?>
    <div class="box-emprestimo container text-light">
        <div>
            <h3>Lista de Emprestimos</h3>
            <div class="btn btn-primary">
                <a class="text-decoration-none text-light"
                    href="index.php?menu=emprestimos&idCliente=<?= $idCliente ?>&menuEmprestimos=addEmprestimo">
                    Novo Empréstimo
                    <i class="ph ph-plus"></i>
                </a>
            </div>
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>ID Empréstimo</th>
                        <th>Data de Empréstimo</th>
                        <th>Data de Devolução</th>
                        <th>Status</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT idEmprestimo, date_format(dataDevolucaoEmprestimo, '%d/%m/%Y') as dataDevolucao, date_format(dataEmprestimo, '%d/%m/%Y') as dataEmprestimo,
                    CASE 
                        WHEN statusEntregaEmprestimo = 1 THEN 'Em Aberto'
                        WHEN statusEntregaEmprestimo = 0 THEN 'Finalizado'
                        END AS statusEntregaEmprestimo,
                        user.idCliente
                        FROM tbemprestimos as emp
                        inner join tbclientes as user on emp.idCliente = user.idCliente
                        where user.idCliente = {$idCliente} order by statusEntregaEmprestimo";

                    $rs = mysqli_query($conexao, $sql);
                    while ($dados = mysqli_fetch_assoc($rs)) {
                        ?>
                    <tbody>
                        <tr>
                            <td>
                                <?= $dados["idEmprestimo"] ?>
                            </td>
                            <td>
                                <?= $dados["dataEmprestimo"] ?>
                            </td>
                            <td>
                                <?= $dados["dataDevolucao"] ?>
                            </td>
                            <td>
                                <?= $dados["statusEntregaEmprestimo"] ?>
                            </td>
                            <td>
                                <a class="btn btn-primary"
                                    href="index.php?menu=emprestimos&idCliente=<?= $dados["idCliente"] ?>&idEmprestimo=<?= $dados["idEmprestimo"] ?>">
                                    <i class="ph ph-pencil-line icone"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
        if ($idEmprestimo > 0) {
            ?>
            <div>
                <div>
                    <h3>Empréstimo Atual</h3>
                    <form action="" method="get">
                        <input class="form-control" type="hidden" name="menu" value="emprestimos">
                        <input class="form-control" type="hidden" name="idEmprestimo" value="<?= $idEmprestimo ?>">
                        <input class="form-control" type="hidden" name="idCliente" value="<?= $idCliente ?>">
                        <input class="form-control" type="hidden" name="menuEmprestimos" value="addLeitura">
                        <div class="input-group mb-5">
                            <div class="input-group-text">Selecione um título</div>
                            <select class="form-select" name="idLeitura" id="idLeitura">
                                <option value=""></option>
                                <?php
                                $sql = "SELECT * FROM tbleituras WHERE statusLeitura = 1";
                                $rs = mysqli_query($conexao, $sql);
                                while ($dados = mysqli_fetch_assoc($rs)) {
                                    ?>
                                    <option value="<?= $dados["idLeitura"] ?>">
                                        <?= $dados["idLeitura"] ?> -
                                        <?= $dados["tituloLeitura"] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input class="form-control" type="date" name="dataDevolucaoEmprestimo" id="dataDevolucaoEmprestimo"
                                value="<?= $dataDeDevolucao ?>">
                            <button class="btn btn-secondary" type="submit">
                                <i class="ph ph-plus"></i>
                            </button>
                        </div>
                    </form>
                    <div>
                        <a class="btn btn-dark" 
                        href="recibo-emprestimo.php?idCliente=<?= $idCliente ?>&idEmprestimo<?= $idEmprestimo ?>&menuEmprestimos=imprimirEmprestimo"
                            target="_blank">
                            Imprimir Recibo
                        </a>
                    </div>
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>Id Leitura</th>
                                <th>Título</th>
                                <th>Data do Empréstimo</th>
                                <th>Data da Devolução</th>
                                <th>Status</th>
                                <th>Baixar</th>
                                <th>Remover</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT l.idLeitura, l.tituloLeitura, date_format(dataEmprestimo, '%d/%m/%y') as dataEmprestimo, date_format(dataDevolucaoEmprestimo, '%d/%m/%y') as dataDevolucaoEmprestimo,
                        CASE 
                            WHEN statusEmprestimo = 0 THEN 'Devolvido'
                            WHEN statusEmprestimo = 1 THEN 'Emprestado'
                            WHEN statusEmprestimo = 2 THEN 'Atrasado'
                            END as statusEmprestimo
                            from tbemprestimos as emp
                            inner join tblistaleiturasemprestadas as lemp
                            inner join tbleituras as l on emp.idEmprestimo = lemp.idEmprestimo 
                            and lemp.idLeitura = l.idLeitura
                            WHERE lemp.idEmprestimo = '{$idEmprestimo}'";

                            $rs = mysqli_query($conexao, $sql);
                            while ($dados = mysqli_fetch_assoc($rs)) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $dados["idLeitura"] ?>
                                    </td>

                                    <td>
                                        <?= $dados["tituloLeitura"] ?>
                                    </td>

                                    <td>
                                        <?= $dados["dataEmprestimo"] ?>
                                    </td>
                                    <td>
                                        <?= $dados["dataDevolucaoEmprestimo"] ?>
                                    </td>
                                    <td>
                                        <?= $dados["statusEmprestimo"] ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success"
                                            href="index.php?menu=emprestimos&idCliente=<?= $idCliente ?>&idEmprestimo=<?= $idEmprestimo ?>&menuEmprestimos=baixaLeitura&idLeitura=<?= $dados["idLeitura"] ?>">
                                            <i class="ph ph-download-simple icone"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger"
                                            href="index.php?menu=emprestimos&idCliente=<?= $idCliente ?>&idEmprestimo=<?= $idEmprestimo ?>&menuEmprestimos=removeleitura&idLeitura=<?= $dados["idLeitura"] ?>">
                                            <i class="ph ph-trash icone"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
?>