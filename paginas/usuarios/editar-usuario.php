<header>
    <h2>Editar Usuário</h2>
</header>
<?php
$loginUsuario = $_GET["loginUsuario"];
$sql = "SELECT loginUsuario, nomeUsuario,
emailUsuario, telefoneUsuario, date_format(dataAdmissaoUsuario, '%d/%m/%y') as dataAdmissaoUsuario,
senhaUsuario
from tbusuarios 
where loginUsuario = '{$loginUsuario}'";
$rs = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($rs);
?>
<form action="index.php?menu=atualizar-usuario" method="post">
    <div>
        <label for="dataAdmissaoUsuario">Data de Admissão:</label>
        <input type="text" name="dataAdmissaoUsuario" id="dataAdmissaoUsuario" value="<?=$dados["dataAdmissaoUsuario"]?>" readonly>
    </div>
    <div>
        <label for="loginUsuario">Login:</label>
        <input type="text" id="loginUsuario" name="loginUsuario" value="<?=$dados["loginUsuario"]?>" readonly>
    </div>
    <div>
        <label for="senhaUsuario">Senha:</label>
        <input type="password" name="senhaUsuario" id="senhaUsuario" value="<?=$dados["senhaUsuario"]?>" >
    </div>
    <div>
        <label for="nomeUsuario">Nome:</label>
        <input type="text" name="nomeUsuario" id="nomeUsuario" value="<?=$dados["nomeUsuario"]?>" >
    </div>
    <div>
        <label for="emailUsuario">E-mail:</label>
        <input type="email" name="emailUsuario" id="emailUsuario" value="<?=$dados["emailUsuario"]?>" >
    </div>
    <div>
        <label for="telefoneUsuario">Telefone:</label>
        <input type="tel" name="telefoneUsuario" id="telefoneUsuario" value="<?=$dados["telefoneUsuario"]?>" >
    </div>
    <div>
        <input type="submit" value="Salvar">
    </div>
</form>
