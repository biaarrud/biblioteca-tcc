<div class="container-fluid">
    <div class="container text-light">
        <header>
            <h2>Cadastro de autor</h2>
        </header>
        <div>
            <form action="index.php?menu=inserir-autor" method="post">
                <div class="mb-3">
                    <label class="form-label" for="nomeAutor">Nome</label>
                    <input class="form-control" type="text" name="nomeAutor">
                </div>
                <div class="mb-5">
                    <label class="form-label" for="nacionalidadeAutor">Nacionalidade</label>
                    <input class="form-control" type="text" name="nacionalidadeAutor">
                </div>
                <div class="d-grid gap-2 col-3 mx-auto">
                    <input class="btn btn-success" type="submit" value="Salvar">
                </div>
            </form>
        </div>
    </div>
</div>