<div class="container fluid">
    <div class="container text-light">
        <header>
            <h2>
                Cadastrar Usuário
            </h2>
        </header>
        <form action="index.php?menu=inserir-usuario" method="post">
            <div class="mb-3">
                <label class="form-label" for="loginUsuario">Login</label>
                <input class="form-control" type="text" name="loginUsuario" id="loginUsuario">
            </div>
            <div class="mb-3">
                <label class="form-label" for="nomeUsuario">Nome</label>
                <input class="form-control" type="text" name="nomeUsuario" id="nomeUsuario">
            </div>
            <div class="mb-3">
                <label class="form-label" for="emailUsuario">E-mail</label>
                <input class="form-control" type="email" name="emailUsuario" id="emailUsuario">
            </div>
            <div class="mb-3">
                <label class="form-label" for="telefoneUsuario">Telefone</label>
                <input class="form-control" type="text" name="telefoneUsuario" id="telefoneUsuario">
            </div>
            <div class="mb-3">
                <label class="form-label" for="dataAdmissaoUsuario">Data de Admissão</label>
                <input class="form-control" type="date" name="dataAdmissaoUsuario" id="dataAdmissaoUsuario">
            </div>
            <div class="mb-5">
                <label class="form-label" for="senhaUsuario">Senha</label>
                <input class="form-control" type="password" name="senhaUsuario" id="senhaUsuario">
            </div>
            <div class="d-grid gap-2 col-3 mx-auto">
                <input class="btn btn-success" type="submit" value="Salvar">
            </div>
        </form>
    </div>
</div>