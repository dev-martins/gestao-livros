@include('dashboard.layout.header')

<!-- .navbar -->
@include('dashboard.layout.menu')
<!-- /.navbar -->

<!-- Main Sidebar Container -->
@include('dashboard.layout.sidebar')
<!-- / Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Livros</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Editora</th>
                                        <th>Edição</th>
                                        <th>Ano Public.</th>
                                        <th>Autor</th>
                                        <th>Assunto</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ultra Aprendizado</td>
                                        <td>HarperCollins Brasil</td>
                                        <td>1</td>
                                        <td>2021</td>
                                        <td>Scott Young</td>
                                        <td>Administração</td>
                                        <td class="td-buttons">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                            </table>

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
                                                            <select name="autor" multiple class="form-control" id="autor">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- Select multiple-->
                                                        <div class="form-group">
                                                            <label>Assunto</label>
                                                            <select name="assunto" multiple class="form-control" id="assunto">
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
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@push('footer-scripts')
<!-- Scripts específicos da página -->
<script src="{{ asset('js/dash/assuntos.js') }}"></script>
<script src="{{ asset('js/dash/autores.js') }}"></script>
<script src="{{ asset('js/dash/livros.js') }}"></script>
@endpush

<!-- Main Footer -->
@include('dashboard.layout.footer')
