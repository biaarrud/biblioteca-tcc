<div class="container-fluid">
    <div class="container text-light">
        <h2>Cadastrar Gênero</h2>
        <div>
            <form action="index.php?menu=inserir-genero" method="post">
                <div class="alert alert-danger" role="alert">
                    Atenção! Não é possível excluir após inserção, apenas editar!
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tituloGeneroLeitura">Titulo</label>
                    <input type="text" class="form-control" name="tituloGeneroLeitura">
                </div>
                <div class="mb-5">
                    <label class="form-label" for="descricaoGeneroLeitura">Descrição</label>
                    <textarea name="descricaoGeneroLeitura" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="d-grid gap-2 col-3 mx-auto">
                    <input class="btn btn-success" type="submit" value="Salvar">
                </div>
            </form>
        </div>
    </div>
</div>