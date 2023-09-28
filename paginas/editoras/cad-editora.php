<div class="container-fluid">
    <div class="container text-light">
        <header>
            <h2>Cadastrar Editora</h2>
        </header>
        <div>
            <form action="index.php?menu=inserir-editora" method="post">
                <div class="mb-3">
                    <label class="form-label" for="cnpjEditora">CNPJ</label>
                    <input class="form-control" type="text" name="cnpjEditora" id="cnpjEditora">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="razaoSocialEditora">Razão Social</label>
                    <input class="form-control" type="text" name="razaoSocialEditora" id="cnpjEditora">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nomeFantasia">Nome Fantasia</label>
                    <input class="form-control" type="text" name="nomeFantasia" id="nomeFantasia">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="enderecoEditora">Rua</label>
                    <input class="form-control" type="text" name="enderecoEditora" id="enderecoEditora">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="bairroEditora">Bairro</label>
                    <input class="form-control" type="text" name="bairroEditora" id="bairroEditora">
                </div>
                <div class="mb-4">
                    <label class="form-label" for="cidadeEditora">Cidade</label>
                    <input class="form-control" type="text" name="cidadeEditora" id="cidadeEditora">
                </div>
                <div class="input-group mb-5">
                    <label class="input-group-text" for="estadoEditora">Selecione o estado</label>
                    <select class="form-select" name="estadoEditora" id="estadoEditora">
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

                <div class="d-grid gap-2 col-3 mx-auto" >
                    <input class="btn btn-success" type="submit" value="Salvar">
                </div>
            </form>
        </div>
    </div>
</div>