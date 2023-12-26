<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Livros</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Titulo</label>
                                <input name="titulo" type="text" id="titulo" class="form-control" placeholder="Titulo">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Editora</label>
                                <input name="editora" type="text" id="editora" class="form-control" placeholder="Editora">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Select multiple-->
                            <div class="form-group">
                                <label>Autor</label>
                                <select name="autores" multiple class="form-control" id="autor">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- Select multiple-->
                            <div class="form-group">
                                <label>Assunto</label>
                                <select name="assuntos" multiple class="form-control" id="assunto">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display: flex;align-items:baseline;">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Ano Publicação</label>
                                <input name="ano-publicacao" type="text" id="ano-publicacao" class="form-control" placeholder="2023">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Edição</label>
                                <input name="edicao" type="number" min="1" id="edicao" class="form-control" placeholder="Edição">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" id="salvar" class="btn btn-primary">Salvar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
