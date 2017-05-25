@extends('templates.app')

@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      	 Data Siswa <small><strong>{{ Session::get('nama_kelas') }}</strong></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#!"></a>Menu</li>
        <li><a href="#!"></a>Siswa</li>
      </ol>
    </section>
	<section class="content">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-6">
	      <div class="info-box bg-green">
	            <span class="info-box-icon">{{ count($L) }}</span>

	            <div class="info-box-content" style="padding-left: 25px;padding-top: 15px">
	              <i class="fa fa-male fa-4x"></i>
	            </div>
	            <!-- /<div class="info-b"></div>ox-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>

	     <div class="col-md-3 col-sm-6 col-xs-6">
	      <div class="info-box bg-green">
	            <span class="info-box-icon">{{ count($P) }}</span>

	            <div class="info-box-content" style="padding-left: 25px;padding-top: 15px">
	              <i class="fa fa-female fa-4x"></i>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>
		</div>
		<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Siswa</h3>
            </div>
		<div class="box-body">
                                <table id="MyTable" class="table table-hover table-striped table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                        @foreach($siswa as $data)
            <tr>
            <td>{{ $no++ }}</td>
                        <td>{{ $data->nama_lengkap }}</td>
                      <td>
             <a href="{{ route('siswa.detail', $data->id) }}" class="btn btn-info btn-xs">Detail</a>
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
