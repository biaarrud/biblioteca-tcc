<div class="container-fluid">
    <div class="container text-light">
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
            <div class="mb-3">
                <label class="form-label" for="dataAdmissaoUsuario">Data de Admissão</label>
                <input class="form-control" type="text" name="dataAdmissaoUsuario" id="dataAdmissaoUsuario"
                    value="<?= $dados["dataAdmissaoUsuario"] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="loginUsuario">Login</label>
                <input class="form-control" type="text" id="loginUsuario" name="loginUsuario" value="<?= $dados["loginUsuario"] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="senhaUsuario">Senha</label>
                <input class="form-control" type="password" name="senhaUsuario" id="senhaUsuario" value="<?= $dados["senhaUsuario"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="nomeUsuario">Nome</label>
                <input class="form-control" type="text" name="nomeUsuario" id="nomeUsuario" value="<?= $dados["nomeUsuario"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="emailUsuario">E-mail</label>
                <input class="form-control" type="email" name="emailUsuario" id="emailUsuario" value="<?= $dados["emailUsuario"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="telefoneUsuario">Telefone</label>
                <input class="form-control" type="tel" name="telefoneUsuario" id="telefoneUsuario" value="<?= $dados["telefoneUsuario"] ?>">
            </div>
            <div class="mb-3">
                <input type="submit" value="Salvar">
            </div>
        </form>
    </div>
</div>