<header>
    <h2>Editar Cliente</h2>
</header>
<?php
$idCliente = $_GET["idCliente"];
$sql = "SELECT * FROM tbclientes where idCliente = $idCliente";
$rs = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($rs);
?>
<form action="index.php?menu=atualizar-cliente" method="post">
    <div>
        <label for="idCliente">Id</label>
        <input type="text" name="idCliente" id="idCliente" value="<?= $dados["idCliente"] ?>" readonly>
    </div>
    <div>
        <label for="nomeCliente">Nome Completo</label>
        <input type="text" name="nomeCliente" id="nomeCliente" value="<?= $dados["nomeCliente"] ?>">
    </div>
    <div>
        <label for="emailCliente">Email</label>
        <input type="text" name="emailCliente" id="emailCliente" value="<?= $dados["emailCliente"] ?>">
    </div>
    <div>
        <label for="cpfCliente">CPF</label>
        <input type="text" name="cpfCliente" id="cpfCliente" value="<?= $dados["cpfCliente"] ?>">
    </div>
    <div>
        <label for="telefoneCliente">Telefone</label>
        <input type="text" name="telefoneCliente" id="telefoneCliente" value="<?= $dados["telefoneCliente"] ?>">
    </div>
    <div>
        <label for="enderecoCliente">Rua</label>
        <input type="text" name="enderecoCliente" id="enderecoCliente" value="<?= $dados["enderecoCliente"] ?>">
    </div>
    <div>
        <label for="bairroCliente">Bairro</label>
        <input type="text" name="bairroCliente" id="bairroCliente" value="<?= $dados["bairroCliente"] ?>">
    </div>
    <div>
        <label for="cidadeCliente">Cidade</label>
        <input type="text" name="cidadeCliente" id="cidadeCliente" value="<?= $dados["cidadeCliente"] ?>">
    </div>
    <div>
        <label for="estadoCliente">Estado</label>
        <select name="estadoCliente" id="estadoCliente">
            <option value="">selecione um estado</option>
            <?php
            $sql = "SELECT estadoCliente from tbclientes where idCliente = '{$idCliente}'";
            $rs = mysqli_query($conexao, $sql);
            while ($dadosEst = mysqli_fetch_assoc($rs)) {
                ?>
                <option 
                <?php echo ($dados["estadoCliente"]==$dadosEst["estadoCliente"])?"selected":"" ?> 
                value="<?= $dadosEst["estadoCliente"] ?>">
                <?=$dados["estadoCliente"]?>
                </option>
                <?php
            }
            ?>
                <option value="SP">SP</option>
                <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AP">AP</option>
                <option value="AM">AM</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MT">MT</option>
                <option value="MS">MS</option>
                <option value="MG">MG</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PR">PR</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="SC">SC</option>
                <option value="SE">SE</option>
                <option value="TO">TO</option>
        </select> 
    </div>
    <div>
        <input type="submit" value="atualizar">
    </div>
</form>