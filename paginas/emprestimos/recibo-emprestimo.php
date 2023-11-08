<?php
include("../../db/conexao.php");
$idCliente = $_GET["idCliente"];
$idEmprestimo = $_GET["idEmprestimo"];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estilo-recibo.css">
    <title>recibo de empréstimo</title>
</head>

<body>
    <h1>recibo de empréstimo</h1>
    <div class="box-recibo">
        <table>
            <?php
            $sql = "SELECT nomeCliente, date_format(dataEmprestimo, '%d/%m/%Y') as dataEmp,
            CASE
                WHEN statusEntregaEmprestimo = 0 THEN 'em aberto'
                WHEN statusEntregaEmprestimo = 1 THEN 'finalizado'
                end as statusEntregaEmprestimo
            FROM tbclientes as c
            inner join tbemprestimos as e
            on c.idCliente = e.idCliente
            WHERE idEmprestimo = '{$idEmprestimo}'";
            $rs = mysqli_query($conexao, $sql);
            $dados = mysqli_fetch_assoc($rs);
            ?>
            <tr>
                <th>codigo empréstimo:</th>
                <td>
                    <?= $idEmprestimo ?>
                </td>
                <th>data de entrega:</th>
                <td>
                    <?= $dados["dataEmp"] ?>
                </td>
            </tr>
            <tr>
                <th>codigo cliente:</th>
                <td>
                    <?= $idCliente ?>
                </td>
                <th>nome cliente</th>
                <td>
                    <?= $dados["nomeCliente"] ?>
                </td>
            </tr>
        </table>
        <table>
            <thead>
                <tr>
                    <th>id leitura</th>
                    <th>titulo</th>
                    <th>data de entrega</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT *, date_format(dataDevolucaoEmprestimo, '%d/%m/%y') as dataDev,
                        CASE
                            WHEN statusLeitura = 0 THEN 'Emprestado'
                            WHEN statusLeitura = 1 THEN 'Disponível'
                            WHEN statusLeitura = 2 THEN 'Indisponível'
                        END AS statusLEmp
                        FROM tbemprestimos as emp
                        inner join tblistaleiturasemprestadas as LEmp
                        inner join tbleituras as l on emp.idEmprestimo = LEmp.idEmprestimo and LEmp.idLeitura = l.idLeitura
                        WHERE emp.idEmprestimo = '{$idEmprestimo}'";

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
                            <?= $dados["dataDev"] ?>
                        </td>
                        <td>
                            <?= $dados["statusLEmp"] ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>