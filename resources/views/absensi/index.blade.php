@extends('templates.app')

{{-- @include('templates.token') --}}

@section('content')
	<section class="content-header">
      <h1>
      	Data Absensi <small>Bulan <b><?php echo date('F'); ?></b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Absensi</li>
      </ol>
    </section>
    <section class="content">
            <div class="row" style="margin-bottom: 8px">
                <div class="col-xs-12">
                <a href="{{ route('absensi.list') }}" class="btn btn-primary">List Absensi <i class="fa fa-list"></i></a>
            </div>
            </div>
    	<div class="row">

    	<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelas : <b>{{ $siswa[0]->kelas->nama_kelas }}</b></h3>

                <a href="{{ route('absensi.pdf') }}" class="btn btn-warning pull-right cetak"><i class="fa fa-print"></i> Cetak</a>

            </div>
            <div class="box-body">

            @if(Session::has('msg'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{ Session::get('msg') }}</strong>
                </div>
            @endif
                <form action="{{ route('absensi.index') }}" method="post" id="absensi">
                <div class="table-responsive">
                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Sakit</th>
                        <th>Ijin</th>
                        <th>Absen</th>
                        <th>Keterangan</th>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                        @foreach($siswa as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama_lengkap }}</td>
                                <td>
                                    <input type="text" name="sakit[]" class="form-control" onkeypress="return isNumber(event)" maxlength="2" required="" value="0">
                                </td>
                                <td>
                                    <input type="text" name="ijin[]" class="form-control" onkeypress="return isNumber(event)" maxlength="2" required="" value="0">
                                </td>
                                <td>
                                    <input type="text" name="absen[]" class="form-control" onkeypress="return isNumber(event)" maxlength="2" required="" value="0">
                                </td>
                                <td>
                                    <input type="text" name="keterangan[]" class="form-control">
                                   <input type="hidden" name="siswa_id[]" value="{{ $data->id }}">
                </td>
              </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                    <input type="hidden" name="bulan" value="<?php echo date('F'); ?>">
                    <input type="hidden" name="tahun" value="<?php echo date('Y'); ?>">
                    <input type="hidden" name="kelas_id" value="{{$siswa[0]->kelas->id}}">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary simpan">Simpan</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('dashboard.index') }}" class="btn btn-danger">kembali</a>

                    </div>

            </form>
            </div>
	   </div>
       	</div>

    	</div>
    </section>
@endsection
