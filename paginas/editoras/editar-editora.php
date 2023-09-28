<header>
    <h2>Editar editora</h2>
</header>
<?php
$idEditora = $_GET["idEditora"];
$sql = "SELECT * FROM tbeditoras where idEditora = $idEditora";
$rs = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($rs);
?>
<form action="index.php?menu=atualizar-editora" method="post">
    <div>
        <label for="idEditora">ID</label>
        <input type="text" name="idEditora" id="idEditora" value="<?= $dados["idEditora"] ?>" readonly>
    </div>
    <div>
        <label for="cnpjEditora">CNPJ</label>
        <input type="text" name="cnpjEditora" id="cnpjEditora" value="<?= $dados["cnpjEditora"] ?>">
    </div>
    <div>
        <label for="razaoSocialEditora">Razão Social</label>
        <input type="text" name="razaoSocialEditora" id="razaoSocialEditora" value="<?= $dados["razaoSocialEditora"] ?>">
    </div>
    <div>
        <label for="nomeFantasia">Nome Fantasia</label>
        <input type="text" name="nomeFantasia" id="nomeFantasia" value="<?= $dados["nomeFantasia"] ?>">
    </div>
    <div>
        <label for="enderecoEditora">Rua</label>
        <input type="text" name="enderecoEditora" id="enderecoEditora" value="<?= $dados["enderecoEditora"] ?>">
    </div>
    <div>
        <label for="bairroEditora">Bairro</label>
        <input type="text" name="bairroEditora" id="bairroEditora" value="<?= $dados["bairroEditora"] ?>">
    </div>
    <div>
        <label for="cidadeEditora">Cidade</label>
        <input type="text" name="cidadeEditora" id="cidadeEditora" value="<?= $dados["cidadeEditora"] ?>">
    </div>
    <div>
        <label for="estadoEditora">Estado</label>
        <select name="estadoEditora" id="estadoEditora">
            <option value="">selecione um estado</option>
            <?php
            $sql = "SELECT estadoEditora from tbeditoras where idEditora = '{$idEditora}'";
            $rs = mysqli_query($conexao, $sql);
            while ($dadosEst = mysqli_fetch_assoc($rs)) {
                ?>
                <option 
                <?php echo ($dados["estadoEditora"]==$dadosEst["estadoEditora"])?"selected":"" ?> 
                value="<?= $dadosEst["estadoEditora"] ?>">
                <?=$dados["estadoEditora"]?>
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
        <input type="submit" value="Atualizar">
    </div>
</form>