<div class="container-fluid">
<div class="container text-light">
<h2>apagar leitura</h2>
<?php
    $idLeitura = $_GET["idLeitura"];

    $sql = "DELETE FROM tbleituras where idLeitura = $idLeitura";

    $rs = mysqli_query($conexao, $sql) or die ("nao foi possivel excluir" . mysqli_error());
    
    echo "<p> registro apagado com sucesso </p>"
?>
</div>
</div>