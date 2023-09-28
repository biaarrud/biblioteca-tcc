<header>
    <h2>Apagar Cliente</h2>
</header>
<?php
    $idCliente = $_GET["idCliente"];

    $sql = "DELETE FROM tbclientes where idCliente = '{$idCliente}'";

    $rs = mysqli_query($conexao, $sql) or die ("nao foi possivel excluir" . mysqli_error());
    
    echo "<p> registro apagado com sucesso </p>"
?>