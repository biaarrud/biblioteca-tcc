<div class="container-fluid">
<div class="container text-light">
<h2>Inserir Gênero</h2>
<?php
$tituloGeneroLeitura = strip_tags(mysqli_escape_string($conexao, $_POST["tituloGeneroLeitura"]));
$descricaoGeneroLeitura = strip_tags(mysqli_escape_string($conexao, $_POST["descricaoGeneroLeitura"]));

$sql = "INSERT INTO tbgeneroleitura (
    tituloGeneroLeitura,
    descricaoGeneroLeitura
    )VALUES(
        '{$tituloGeneroLeitura}',
        '{$descricaoGeneroLeitura}'
    )";

$rs = mysqli_query($conexao, $sql);
if ($rs) {
    echo "<p> Rgistro inserido com sucesso</p>";
} else {
    echo "<p>Erro ao inserir</p>";
}
?>
</div>
</div>