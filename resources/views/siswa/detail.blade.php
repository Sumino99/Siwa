@extends('templates.app')

@section('content')
	<section class="content">
		<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ URL::to('images/no_user.jpg') }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $siswa->nama_lengkap }}</h3>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Kelas</b> <a class="pull-right">{{ $siswa->kelas->nama_kelas }}</a>
                </li>
              </ul>

              <a href="{{ route('siswa.index') }}" class="btn btn-primary btn-block"><b>Kembali</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Biodata" data-toggle="tab">Biodata</a></li>
              <li><a href="#Pelanggaran" data-toggle="tab">Pelanggaran</a></li>
              <li><a href="#Spp" data-toggle="tab">Spp</a></li>
              <li><a href="#Absensi" data-toggle="tab">Absensi</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="Biodata">
                    <table class="table">
                          <tbody>
                                <tr>
                                    <td>Nama Siswa</td>
                                    <td>{{ $siswa->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>{{ $siswa->jenis_kelamin }}</td>
                                </tr>
                          </tbody>
                    </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="Pelanggaran">
                   <table class="table table-bordered table-striped">
                      <thead>
                        <th><strong>Bentuk Pelanggaran</strong></th>
                        <th><strong>Tanggal Pelanggaran</strong></th>
                      </thead>
                      <tbody>
                        @foreach($pelanggaran as $data)
                            <tr>
                              <td>{{ $data->bentuk_pelanggaran }}</td>
                              <td>{{ date('d/F/Y',strtotime($data->tanggal_pelanggaran)) }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                   </table>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="Spp">
                  <table class="table table-bordered table-striped">
                      <thead>
                        @if($spp)
                            <th><strong>Status</strong></th>
                              <th><strong>Menunggak Selama</strong></th>
                            <th><strong>Keterangan</strong></th>
                            <th><strong>Bulan</strong></th>
                        @endif
                        <th><strong>Tahun</strong></th>
                      </thead>
                      <tbody>
                        @foreach($spp as $data)
                            <tr>
                            @if($data)
                            <td><span class="badge">{{ $data->status }}</span></td>
                                  <td>{{ $data->bulan_tunggak }} Bln</td>
                                  <td>{{ $data->keterangan }}</td>
                                  <td>{{ $data->bulan }}</td>
                              @endif
                                  <td>{{ $data->tahun }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                   </table>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="Absensi">
                  <table class="table table-bordered table-striped">
                      <thead>
                        <th><strong>No.</strong></th>
                        <th><strong>Sakit</strong></th>
                        <th><strong>Ijin</strong></th>
                        <th><strong>Absen</strong></th>
                        <th><strong>Keterangan</strong></th>
                        <th><strong>Bulan</strong></th>
                        <th><strong>Tahun</strong></th>
                      </thead>
                      <tbody>
                      <?php $no = 1; ?>
                        @foreach($absensi as $data)
                            <tr>
                            <td>{{ $no++ }}.</td>
                            <td>{{ $data->sakit }}</td>
                            <td>{{ $data->ijin }}</td>
                            <td>{{ $data->absen }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td>{{ $data->bulan }}</td>
                            <td>{{ $data->tahun }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                   </table>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	</section>
@endsection
