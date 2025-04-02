<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') - Admin Panel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- CKEditor -->
  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/translations/vi.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/plugins/image/plugin.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/plugins/media-embed/plugin.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/plugins/table/plugin.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/plugins/font/plugin.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/plugins/alignment/plugin.js"></script>
  <style>
    body {
        background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
    }
    .form-control:focus {
        border-color: #8e44ad;
        box-shadow: 0 0 0 0.25rem rgba(142, 68, 173, 0.25);
    }
    .btn-primary {
        background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
        border: none;
        box-shadow: 0 4px 15px rgba(142, 68, 173, 0.4);
    }
    .btn-outline-primary {
        border-color: #8e44ad;
        color: #8e44ad;
    }
    .btn-outline-primary:hover {
        background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
        border-color: #8e44ad;
        color: #fff;
    }
    a {
        color: #8e44ad;
    }
    a:hover {
        color: #9b59b6;
    }
    .icon {
        color: #8e44ad;
    }
  </style>
  @stack('styles')
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    @include('layouts.partials.admin.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.partials.admin.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                @yield('header')
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('layouts.partials.admin.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo -->
<script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

<script>
// Set up CSRF token for all AJAX requests
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Cấu hình mặc định cho toastr
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
</script>

@stack('scripts')
</body>
</html>
