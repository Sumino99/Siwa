@extends('templates.app')

@include('templates.token')

@section('content')
	 <section class="content-header">
      <h1>
      	 Data Literasi <small>Bulan <b><?php echo date('F'); ?></b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#!"></a>Menu</li>
        <li><a href="#!"></a>Literasi</li>
      </ol>
    </section>

    <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{ route('literasi.pdf') }}" class="btn btn-warning pull-right"><i class="fa fa-print"></i> Cetak</a>
                </div>
            </div>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
                                                         <div class="box-header">
                                                          <h3 class="box-title">Data Literasi</h3>
                                                        </div>
                                                    <div class="box-body">
                                                            <form action="{{ route('literasi.index') }}" method="post" id="literasi">
                                                            <div class="form-group">
                                                                <label for="">Nama guru mapel jam ke-1</label>
                                                                <select name="guru_id" class="form-control select2" required="true">
                                                                    <option disabled="true" selected="true">- Pilih Guru -</option>
                                                                    @foreach($guru as $data)
                                                                        <option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Bahan Literasi</label>
                                                                <input type="text" name="bahan_literasi" class="form-control" required="true">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Total Literasi</label>
                                                                <input type="text" name="total_literasi" onkeypress="isNumber(event)" class="form-control" required="true">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Tidak Ada Literasi</label>
                                                                <input type="text" name="tidak_literasi" onkeypress="isNumber(event)" class="form-control" required="true">
                                                            </div>

                                                            <input type="hidden" name="bulan" value="<?php echo date('F'); ?>">
                                                            <input type="hidden" name="tahun" value="<?php echo date('Y'); ?>">
                                                            {{-- <input type="hidden" name="walas_id" value="1">     --}}
                                                            {{-- <div class="form-group">
                                                                <label for="">Persentase Megajar</label>
                                                                <input type="text" name="persentase_literasi" class="form-control" disabled value="100%">
                                                                <input type="hidden" name="persentase_literasi">
                                                            </div> --}}
                                                            <div class="clearfix"></div>
                                                            <button  class="btn btn-primary simpan">Simpan</button>
                                                            <a href="{{ route('dashboard.index') }}" class="btn btn-danger">Kembali</a>
                                                        </form>
                                                    </div>
                                                    </div>
			</div>
		</div>
	</section>
@endsection

@section('customJs')
	<script type="text/javascript">
		$(document).ready(function() {
		 	var body = $('body');

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
    		// ajax Simpan
    		$('.simpan').click(function(e) {
    			e.preventDefault();

    			var action = $("#literasi").find("form").attr("action");
    			// var walas_id = $("#literasi").find("input[name='walas_id']").val();
    			var guru_id =  $("#literasi").find("select[name='guru_id']").val();
    			var bahan_literasi =  $("#literasi").find("input[name='bahan_literasi']").val();
    			var total_literasi =  $("#literasi").find("input[name='total_literasi']").val();
    			var tidak_ada_literasi =  $("#literasi").find("input[name='tidak_literasi']").val();
    			var perolehan = parseFloat(total_literasi) - parseFloat(tidak_ada_literasi);
    			var persentase = (perolehan / parseFloat(total_literasi)) * 100;
                                      // console.log(persentase);
    			var bulan =  $("#literasi").find("input[name='bulan']").val();
    			var tahun =  $("#literasi").find("input[name='tahun']").val();
    			// console.log(walas_id + nama_guru + bahan_literasi + total_literasi + tidak_ada_literasi + bulan + tahun);
    			$.ajax({
    				dataType: 'json',
    				type: 'POST',
    				url: action,
    				data: {
    					guru_id: guru_id,
    					bahan_literasi: bahan_literasi,
    					total_literasi: total_literasi,
    					tdk_ada_literasi: tidak_ada_literasi,
    					persentase_mengajar: Math.round(persentase),
    					bulan: bulan,
    					tahun: tahun,
    				},
    				success: function(data){
    					// console.log(data);
    					$('#literasi')[0].reset();
    					toastr.success('Data berhasil disimpan', 'Berhasil !', {timeOut: 5000});
    				},
    				error: function() {
    					toastr.danger('Data gagal disimpan', 'Gagal !', {timeOut: 3000});
    				}
    			});
    		});
		});
	</script>
@endsection
