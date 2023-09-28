<header>
    <h2>Inserir Usuário</h2>
</header>
<?php
$loginUsuario = strip_tags(mysqli_escape_string($conexao, $_POST["loginUsuario"]));
$nomeUsuario = strip_tags(mysqli_escape_string($conexao, $_POST["nomeUsuario"]));
$emailUsuario = strip_tags(mysqli_escape_string($conexao, $_POST["emailUsuario"]));
$telefoneUsuario = strip_tags(mysqli_escape_string($conexao, $_POST["telefoneUsuario"]));
$dataAdmissaoUsuario = strip_tags(mysqli_escape_string($conexao, $_POST["dataAdmissaoUsuario"]));
$senhaUsuario = strip_tags(mysqli_escape_string($conexao, $_POST["senhaUsuario"]));

$sql = "INSERT INTO tbusuarios (
    loginUsuario,
    nomeUsuario,
    emailUsuario,
    telefoneUsuario,
    dataAdmissaoUsuario,
    senhaUsuario )
    VALUES (
        '{$loginUsuario}',
        '{$nomeUsuario}',
        '{$emailUsuario}',
        '{$telefoneUsuario}',
        '{$dataAdmissaoUsuario}',
        '{$senhaUsuario}'
    )";

$rs = mysqli_query($conexao, $sql);
if ($rs) {
    echo "<p>Registro inserido com sucesso!</p>";
} else {
    echo "<p>Erro</p>";
}
?>