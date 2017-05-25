@extends('templates.app')

@section('content')
	 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      	Menu | <strong>SIWA</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Menu</li>
      </ol>
    </section>
  @include('templates.alert')
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
          <a href="@if(Session::get('idadmin')){{ route('siswa.adminIndex') }}@else {{ route('siswa.index') }}@endif" style="color: black">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <h3>Siswa</h3>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        @if(Session::get('idwalas'))
        <div class="col-md-3 col-sm-6 col-xs-6">
    <a href="{{ route('spp.index') }}" style="color: black">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <h3>SPP</h3>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-6">
          <a href="{{ route('sarpras.index') }}" style="color: black">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-building"></i></span>

            <div class="info-box-content">
              <h3 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">Sarpras</h3>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-6">
        <a href="{{ route('pelanggaran.index') }}" style="color: black">
          <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="fa fa-address-card"></i></span>
            <div class="info-box-content">
              <h3 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">Pelanggaran</h3>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-8 col-xs-offset-2">
        <a href="{{ route('kbm.index') }}" style="color: black">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-edit"></i></span>
            <div class="info-box-content">
              <h3 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">KBM</h3>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-6">
        <a href="{{ route('literasi.index') }}" style="color: black">
          <div class="info-box">
            <span class="info-box-icon bg-maroon"><i class="fa fa-comment"></i></span>
            <div class="info-box-content">
              <h3 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">Literasi</h3>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-6">
        <a href="{{ route('absensi.index') }}" style="color: black">
          <div class="info-box">
            <span class="info-box-icon bg-navy"><i class="fa fa-file-text"></i></span>
            <div class="info-box-content">
              <h3 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">Absensi</h3>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        @endif
          @if(Session::get("idadmin"))
              <div class="col-md-3 col-sm-6 col-xs-6">
                  <a href="{{ route('walas.index') }}" style="color: black">
                      <div class="info-box">
                          <span class="info-box-icon bg-blue"><i class="fa fa-user-o"></i></span>
                          <div class="info-box-content">
                              <h3 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">Walas</h3>
                          </div>
                          <!-- /.info-box-content -->
                      </div>
                  </a>
                  <!-- /.info-box -->
              </div>

              <div class="col-md-3 col-sm-6 col-xs-6">
                  <a href="{{ route('mapel.index') }}" style="color: black">
                      <div class="info-box">
                          <span class="info-box-icon bg-green"><i class="fa fa-book"></i></span>
                          <div class="info-box-content">
                              <h3 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">Mapel</h3>
                          </div>
                          <!-- /.info-box-content -->
                      </div>
                  </a>
                  <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6">
                  <a href="{{ route('kelas.index') }}" style="color: black">
                      <div class="info-box">
                          <span class="info-box-icon bg-maroon"><i class="fa fa-rocket"></i></span>
                          <div class="info-box-content">
                              <h3 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">Kelas</h3>
                          </div>
                          <!-- /.info-box-content -->
                      </div>
                  </a>
                  <!-- /.info-box -->
              </div>

              <div class="col-md-3 col-sm-6 col-xs-6">
                  <a href="{{ route('guru.index') }}" style="color: black">
                      <div class="info-box">
                          <span class="info-box-icon bg-navy"><i class="fa fa-graduation-cap"></i></span>
                          <div class="info-box-content">
                              <h3 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">Guru</h3>
                          </div>
                          <!-- /.info-box-content -->
                      </div>
                  </a>
                  <!-- /.info-box -->
              </div>
          @endif
        <!-- /.col -->
      </div>
      <!-- /.row -->
      @if(Session::get('idwalas'))
          <div class="row">
              <div class="col-lg-6 col-lg-offset-3 col-xs-8 col-xs-offset-2">
                  <a href="{{ route('dashboard.pdf') }}" style="color: black">
                      <div class="info-box">
                          <span class="info-box-icon bg-aqua"><i class="fa fa-rocket"></i></span>
                          <div class="info-box-content">
                              <h3 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">Cetak Laporan Utama</h3>
                          </div>
                          <!-- /.info-box-content -->
                      </div>
                  </a>
                  <!-- /.info-box -->
              </div>
          </div>
          @endif
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
