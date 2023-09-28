<header>
    <h2>
        Cadastrar Usuário
    </h2>
</header>
<form action="index.php?menu=inserir-usuario" method="post">
    <div>
        <label for="loginUsuario">Login</label>
        <input type="text" name="loginUsuario" id="loginUsuario">
    </div>
    <div>
        <label for="nomeUsuario">Nome</label>
        <input type="text" name="nomeUsuario" id="nomeUsuario">
    </div>
    <div>
        <label for="emailUsuario">E-mail</label>
        <input type="email" name="emailUsuario" id="emailUsuario">
    </div>
    <div>
        <label for="telefoneUsuario">Telefone</label>
        <input type="text" name="telefoneUsuario" id="telefoneUsuario">
    </div>
    <div>
        <label for="dataAdmissaoUsuario">Data de Admissão</label>
        <input type="date" name="dataAdmissaoUsuario" id="dataAdmissaoUsuario">
    </div>
    <div>
        <label for="senhaUsuario">Senha</label>
        <input type="password" name="senhaUsuario" id="senhaUsuario">
    </div>
    <div>
        <input type="submit" value="Salvar">
    </div>
</form>