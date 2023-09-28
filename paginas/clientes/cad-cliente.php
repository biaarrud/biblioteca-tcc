<header>
    <h2>Cadastrar Cliente</h2>
</header>
<div>
    <form action="index.php?menu=inserir-cliente" method="post">
        <div>
            <label for="nomeCliente">Nome Completo</label>
            <input type="text" name="nomeCliente" id="nomeCliente">
        </div>
        <div>
            <label for="emailCliente">Email</label>
            <input type="text" name="emailCliente" id="emailCliente">
        </div>
        <div>
            <label for="cpfCliente">CPF</label>
            <input type="text" name="cpfCliente" id="cpfCliente">
        </div>
        <div>
            <label for="telefoneCliente">Telefone</label>
            <input type="text" name="telefoneCliente" id="telefoneCliente">
        </div>
        <div>
            <label for="enderecoCliente">Rua</label>
            <input type="text" name="enderecoCliente" id="enderecoCliente">
        </div>
        <div>
            <label for="bairroCliente">Bairro</label>
            <input type="text" name="bairroCliente" id="bairroCliente">
        </div>
        <div>
            <label for="cidadeCliente">Cidade</label>
            <input type="text" name="cidadeCliente" id="cidadeCliente">
        </div>
        <div>
            <label for="estadoCliente">Selecione o estado</label>
            <select name="estadoCliente" id="estadoCliente">
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
            <input type="submit" value="Salvar">
        </div>
    </form>
</div>