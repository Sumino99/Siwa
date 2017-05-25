@extends('templates.app')

@include('templates.token')

@section('content')

<section class="content-header">
      <h1>
        Data SPP <small>Bulan <b><?php echo date('F'); ?></b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">SPP</li>
      </ol>
    </section>

    <section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelas : <b>{{ $spp[0]->kelas->nama_kelas }}</b></h3>
            </div>
            <div class="box-body">
             <form action="{{ route('spp.tambah') }}" method="post" id="spp">
                <div class="form-group">
                    <label>Pilih Siswa</label>
                    <select name="siswa_id" class="form-control select2" style="width: 100% !important;padding: 0">
                        <option disabled="" selected="">- Pilih Siswa -</option>
                        @foreach($siswa as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_lengkap }}</option>
                        @endforeach
                    </select>            
                </div>
                <div class="form-group">
                    <label>Menunggak Selama</label>
                    <input type="text" name="bulan_tunggak" onkeypress="return isNumber(event)" class="form-control" maxlength="2" required="true">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" required="true"></textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required="true">
                        <option value="menunggak" selected="">Menunggak</option>
                        <option value="lunas">Lunas</option>
                    </select>
                </div>
                <input type="hidden" name="bulan" value="<?php echo date('F'); ?>">
                <input type="hidden" name="tahun" value="<?php echo date('Y'); ?>">

                <button type="submit" class="btn btn-primary simpan">Simpan</button>
                <a href="{{ route('spp.index') }}" class="btn btn-danger">Kembali</a>
            </form>
            </div>
            </div>
            </div>
            </div>
@endsection

@section('customJs')
	<script type="text/javascript">
		$(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			// ajax Simpan
    		$('.simpan').click(function(e) {
    			e.preventDefault();

    			var action = $("#spp").find("form").attr("action");
    			var kelas_id =  {{ $spp[0]->kelas->id }};
    			var siswa_id =   $("#spp").find("select[name='siswa_id']").val();
    			var bulan_tunggak =  $("#spp").find("input[name='bulan_tunggak']").val();
    			var keterangan =  $("#spp").find("textarea[name='keterangan']").val();
    			var status =  $("#spp").find("select[name='status']").val();
    			var bulan = $("#spp").find("input[name='bulan']").val();
    			var tahun = $("#spp").find("input[name='tahun']").val();
    			// var jumlah = parseFloat(sakit) + parseFloat(ijin) + parseFloat(absen);
    			// console.log(jumlah);
    			
    			// console.log(data.length);
    			$.ajax({
    				dataType: 'json',
    				type: 'POST',
    				url: action,
    				data: {
    					kelas_id: kelas_id,
    					siswa_id: siswa_id, 
    					bulan_tunggak: bulan_tunggak,
    					keterangan: keterangan,
    					status: status,
    					bulan: bulan,
    					tahun: tahun,
    				},
    				success: function(data){
    					console.log(data.length);
    					toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 3000});
    					$('#spp')[0].reset();
    				},
    				error: function() {
                        console.log('error');
    				}
    			});
    		});
		});
	</script>
@endsection