<header>
    <h2>Apagar editora</h2>
</header>
<?php
$idEditora = $_GET["idEditora"];

$sql = "DELETE FROM tbeditoras WHERE idEditora = '{$idEditora}'";

$rs = mysqli_query($conexao, $sql) or die ("nao foi possivel excluir" . mysqli_error());
    
    echo "<p> registro apagado com sucesso </p>"
?>