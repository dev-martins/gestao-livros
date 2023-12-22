<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão Livros</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

    <link type="text/css" rel="stylesheet" href="{{ asset('css/loader-jquery/waitMe.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Gestão</b>Livros</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Faça login para iniciar sua sessão</p>

                <form action="../../index3.html" method="post">
                    <div class="input-group mb-3">
                        <input type="email" id="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="button" id="login" class="btn btn-primary btn-block">Entrar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>
    <script src="{{ asset('js/loader-jquery/waitMe.min.js') }}"></script>
    <script src="{{ asset('js/loader-config.js') }}"></script>
    <script src="{{ asset('js/toast-config.js') }}"></script>
    <script src="{{ asset('js/auth.js') }}"></script>
</body>

</html>
