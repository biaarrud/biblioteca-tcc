<div class="container-fluid">
    <div class="container text-light">
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
        <div class="row mb-3">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="idCliente">ID</label>
                        <input type="text" id="idCliente" name="idCliente" class="form-control"  value="<?= $dados["idCliente"] ?>" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="nomeCliente">Nome Completo</label>
                        <input type="text" id="nomeCliente" name="nomeCliente" class="form-control" value="<?= $dados["nomeCliente"]?>">
                    </div>
                </div>
            </div>
        <div class="row mb-3">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="cpfCliente">CPF</label>
                        <input type="text" id="cpfCliente" name="cpfCliente" class="form-control"  value="<?= $dados["cpfCliente"] ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="telefoneCliente">Telefone</label>
                        <input type="text" id="telefoneCliente" name="telefoneCliente" class="form-control" value="<?= $dados["telefoneCliente"] ?>">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="emailCliente">Email</label>
                <input class="form-control" type="text" name="emailCliente" id="emailCliente"
                value="<?= $dados["emailCliente"] ?>">
            </div>
            <div class="row mb-3">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="enderecoCliente">Rua</label>
                            <input type="text" id="enderecoCliente" name="enderecoCliente" class="form-control"  value="<?= $dados["enderecoCliente"] ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="bairroCliente">Bairro</label>
                            <input type="text" id="bairroCliente" name="bairroCliente" class="form-control" value="<?= $dados["bairroCliente"] ?>">
                        </div>
                    </div>
                </div>

            <div class="mb-5">
                <label class="form-label" for="cidadeCliente">Cidade</label>
                <input class="form-control" type="text" name="cidadeCliente" id="cidadeCliente"
                    value="<?= $dados["cidadeCliente"] ?>">
            </div>
            <div>
                <div class="input-group mb-5">
                    <label class="input-group-text" for="estadoCliente">Estado</label>
                    <select class="form-select" name="estadoCliente" id="estadoCliente">
                        <option value="selecione">selecione um estado</option>
                        <?php
                        $sql = "SELECT estadoCliente from tbclientes where idCliente = '{$idCliente}'";
                        $rs = mysqli_query($conexao, $sql);
                        while ($dadosEst = mysqli_fetch_assoc($rs)) {
                            ?>
                            <option <?php echo ($dados["estadoCliente"] == $dadosEst["estadoCliente"]) ? "selected" : "" ?>
                                value="<?= $dadosEst["estadoCliente"] ?>">
                                <?= $dados["estadoCliente"] ?>
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
            </div>
            <div class="mb-5">
                <div class="input-group">
                    <label for="statusCliente" class="input-group-text">Status</label>
                    <select name="statusCliente" id="statusCliente" class="form-select">
                        <option value="1">Liberado</option>
                        <option value="0">Bloquado</option>
                    </select>
                </div>
            </div>
            <div class="d-grid gap-2 col-3 mx-auto">
                <input class="btn btn-primary" type="submit" value="Salvar">
            </div>
        </form>
        
    </div>
</div>