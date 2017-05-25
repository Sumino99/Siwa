@extends('templates.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Data Absensi <small><strong>{{ Session::get('nama_kelas') }}</strong></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#!"></a>Menu</li>
        <li><a href="#!"></a>List Absensi</li>
      </ol>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="{{ route('absensi.index') }}" class="btn btn-danger">Kembali</a>
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
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                        @foreach($absensi as $data)
            <tr>
            <td>{{ $no++ }}</td>
                        <td>{{ $data->bulan }}</td>
                        <td>{{ $data->tahun }}</td>
                      <td>
             <a href="{{ url('dashboard/absensi/listDetail/' . $data->bulan . '/' . $data->tahun) }}" class="btn btn-info">Detail</a>
             </td>
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
