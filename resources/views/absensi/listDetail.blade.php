@extends('templates.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Detail Absensi Bulan<small><strong>{{ $absensi[0]->bulan }} / {{ $absensi[0]->tahun }}</strong></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#!"></a>Menu</li>
        <li><a href="#!"></a>List Absensi</li>
        <li><a href="#!"></a>List Absensi Detail</li>
      </ol>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="{{ route('absensi.list') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
          <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Absensi Keseluruhan</h3>
            </div>
            <div class="box-body">

            <table id="MyTable" class="table table-hover table-striped table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Sakit</th>
                        <th>Ijin</th>
                        <th>Absen</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                        @foreach($absensi as $data)
            <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->siswa->nama_lengkap }}</td>
                        <td>{{ $data->sakit }}</td>
                        <td>{{ $data->ijin }}</td>
                        <td>{{ $data->absen }}</td>
                        <td>{{ $data->jumlah }}</td>
                        <td>{{ $data->keterangan }}</td>
            </tr>
                        @endforeach
                    </tbody>
             </table>
            </div>
          </div>
      </div>
     </div>
    </section>
@endsection
