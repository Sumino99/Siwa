<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Control Panel | SIWA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::to('vendors/font-awesome/css/font-awesome.min.css') }}">
  {{-- datatables --}}
  <link rel="stylesheet" type="text/css" href="{{ URL::to('vendors/datatables/datatables.bootstrap.css') }}">
  {{-- select 2 --}}
  <link rel="stylesheet" type="text/css" href="{{ URL::to('vendors/select2/dist/css/select2.min.css') }}">
  {{-- Wiwysg Html5--}}
  <link rel="stylesheet" type="text/css" href="{{ URL::to('vendors/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  {{-- Toastr CSs --}}
  <link rel="stylesheet" type="text/css" href="{{ URL::to('vendors/toastr/toastr.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::to('css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ URL::to('css/_all-skins.min.css') }}">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
date_default_timezone_set("Asia/Jakarta");
?>
  <header class="main-header">

    <!-- Logo -->
    <a href="{{ route('dashboard.index') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Control Panel</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Control Panel</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ URL::to('images/no_user.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">
              @if(Session::get('idadmin'))
                {{ Session::get('usernameAdmin') }}
              @elseif(Session::get('idwalas'))
                {{ Session::get('usernameWalas') }}
              @endif
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <img src="{{ URL::to('images/no_user.jpg') }}" class="img-circle" alt="User Image">

                <p>
                  @if(Session::get('idadmin'))
                    {{ Session::get('usernameAdmin') }}
                  @elseif(Session::get('idwalas'))
                    {{ Session::get('usernameWalas') }}
                  @endif
                  <small>
                    @if(Session::get('idadmin'))
                      Hello I'am Admin
                    @elseif(Session::get('idwalas'))
                     Wali Kelas {{ Session::get('nama_kelas') }}
                    @endif
                  </small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                @if(Session::get('idwalas'))
                <div class="pull-left">
                  <?php $username = Session::get('username'); ?>
                  <a href="{{ route('dashboard.profile', $username) }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                @endif
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Log Out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ URL::to('images/no_user.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            @if(Session::get('idadmin'))
                {{ Session::get('usernameAdmin') }}
              @elseif(Session::get('idwalas'))
                {{ Session::get('usernameWalas') }}
              @endif
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="{{ route('dashboard.index') }}">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>
        @if(Session::get('idadmin'))
          <li>
          <a href="{{ route('walas.index') }}">
            <i class="fa fa-user-o"></i> <span>Walas</span>
          </a>
        </li>
        @endif
        <li>
          <a href="@if(Session::get('idadmin')){{ route('siswa.adminIndex') }}@else {{ route('siswa.index') }}@endif">
            <i class="fa fa-users"></i> <span>Siswa</span>
          </a>
        </li>
        @if(Session::get('idadmin'))
        <li>
          <a href="{{ route('guru.index') }}">
            <i class="fa fa-graduation-cap"></i> <span>Guru</span>
          </a>
        </li>
        <li>
          <li>
          <a href="{{ route('mapel.index') }}">
            <i class="fa fa-book"></i> <span>Mapel</span>
          </a>
        </li>
        <li>
          <a href="{{ route('kelas.index') }}">
            <i class="fa fa-rocket"></i> <span>Kelas</span>
          </a>
        </li>
        @endif
        @if(Session::get('idwalas'))
         <li>
          <a href="{{ route('spp.index') }}">
            <i class="fa fa-money"></i> <span>SPP</span>
          </a>
        </li>
         <li>
          <a href="{{ route('sarpras.index') }}">
            <i class="fa fa-building"></i> <span>Sarpras</span>
          </a>
        </li>
         <li>
          <a href="{{ route('pelanggaran.index') }}">
            <i class="fa fa-ban"></i> <span>Pelanggaran</span>
          </a>
        </li>
         <li>
          <a href="{{ route('kbm.index') }}">
            <i class="fa fa-pencil"></i> <span>KBM</span>
          </a>
        </li>
         <li>
          <a href="{{ route('literasi.index') }}">
            <i class="fa fa-book"></i> <span>Literasi</span>
          </a>
        </li>
         <li>
          <a href="{{ route('absensi.index') }}">
            <i class="fa fa-edit"></i> <span>Absensi</span>
          </a>
        </li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-<?php echo date('Y'); ?> <a href="#!">Sistem Informasi Walas</a>.</strong> All rights
    reserved.
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ URL::to('vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
{{-- Datatables --}}
<script src="{{ URL::to('vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::to('vendors/datatables/dataTables.bootstrap.min.js') }}"></script>
{{-- Select2 --}}
<script src="{{ URL::to('vendors/select2/dist/js/select2.min.js') }}"></script>
{{-- Wyiwysg Html5--}}
<script src="{{ URL::to('vendors/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
{{-- Toastr --}}
<script src="{{ URL::to('vendors/toastr/toastr.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::to('js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::to('js/demo.js') }}"></script>
{{-- datatables --}}
<script type="text/javascript">
  $(document).ready(function() {
    $('#MyTable').DataTable();
  });
  $("#editor").wysihtml5();
  $(function() {
     $('.select2').select2();
  });

  // validasi number
  function isNumber(evt){
   var charCode = (evt.which) ? evt.which : event.keyCode;
   if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
   return false;
   return true;
  }
</script>
@yield('customJs')

</body>
</html>
