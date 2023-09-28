<header>
    <h2>Inserir Usuário</h2>
</header>

<?php
$nomeCliente = strip_tags(mysqli_escape_string($conexao, $_POST["nomeCliente"]));
$emailCliente = strip_tags(mysqli_escape_string($conexao, $_POST["emailCliente"]));
$cpfCliente = strip_tags(mysqli_escape_string($conexao, $_POST["cpfCliente"]));
$telefoneCliente = strip_tags(mysqli_escape_string($conexao, $_POST["telefoneCliente"]));
$enderecoCliente = strip_tags(mysqli_escape_string($conexao, $_POST["enderecoCliente"]));
$bairroCliente = strip_tags(mysqli_escape_string($conexao, $_POST["bairroCliente"]));
$cidadeCliente = strip_tags(mysqli_escape_string($conexao, $_POST["cidadeCliente"]));
$estadoCliente = strip_tags(mysqli_escape_string($conexao, $_POST["estadoCliente"]));

$sql = "INSERT INTO tbclientes (
    nomeCliente,
    emailCliente,
    cpfCliente,
    telefoneCliente,
    enderecoCliente,
    bairroCliente,
    cidadeCliente,
    estadoCliente
    )VALUES(
        '{$nomeCliente}',
        '{$emailCliente}',
        '{$cpfCliente}',
        '{$telefoneCliente}',
        '{$enderecoCliente}',
        '{$bairroCliente}',
        '{$cidadeCliente}',
        '{$estadoCliente}'
    )";

$rs = mysqli_query($conexao, $sql);
if ($rs) {
    echo "<p> Rgistro inserido com sucesso</p>";
} else {
    echo "<p>Erro ao inserir</p>";
}
?>