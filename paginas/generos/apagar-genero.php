<div class="container-fluid">
<div class="container text-light">
<h2>Apagar gênero</h2>
<?php
    $idGeneroLeitura = $_GET["idGeneroLeitura"];

    $sql = "DELETE FROM tbgeneroleitura where idGeneroLeitura = $idGeneroLeitura";

    $rs = mysqli_query($conexao, $sql) or die ("nao foi possivel excluir" . mysqli_error());
    
    echo "<p> Registro apagado com sucesso </p>"
?>
</div>
</div>