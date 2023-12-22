<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- Axios -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('js/loader-jquery/waitMe.min.js') }}"></script>
<script src="{{ asset('js/loader-config.js') }}"></script>
<script src="{{ asset('js/toast-config.js') }}"></script>
<script src="{{ asset('js/auth.js') }}"></script>

<!-- Stack para scripts específicos da página -->
@stack('footer-scripts')
</body>

</html>
