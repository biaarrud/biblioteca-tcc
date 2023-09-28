<header>
    <h2>Apagar Usuário</h2>
</header>
<?php
$loginUsuario = $_GET["loginUsuario"];

$sql = "DELETE FROM tbusuarios where loginUsuario = '{$loginUsuario}'";

$rs = mysqli_query($conexao, $sql) or die ("Não foi possível".mysqli_error());

echo "<p>Registro apagado</p>";
?>