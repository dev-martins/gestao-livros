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

                                </tbody>
                            </table>

                            @include('dashboard.pages.ui.livros.modals.modal-editar')
                            @include('dashboard.pages.ui.livros.modals.modal-adicionar')
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
