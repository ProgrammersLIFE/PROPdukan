<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>AdminLTE 3 | DataTables</title>
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/') }}/admin/dist/css/adminlte.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('admin.components.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.components.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('/') }}/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('/') }}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ url('/') }}/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/jszip/jszip.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/') }}/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/') }}/admin/dist/js/demo.js"></script>
<!-- Toastr -->
<script src="{{ url('/') }}/admin/plugins/toastr/toastr.min.js"></script>
<!-- Page specific script -->
</body>
</html>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
  </script>
