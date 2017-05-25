@extends('templates.app')

@include('templates.token')

@section('content')
	<section class="content-header">
      <h1>
      	Data KBM <small>Bulan <b><?php echo date('F'); ?></b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">KBM</li>
      </ol>
    </section>

    <section class="content">
    	<div class="row">
    		<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelas : <b>{{ Session::get('nama_kelas') }}</b></h3>
            </div>
            <div class="box-body">
				<form action="{{ route('kbm.index') }}" method="post" id="kbm">
					<div class="form-group">
						<label>Mata Pelajaran</label>
						<select name="mapel" class="form-control select2 selectmapel" required="required">
							<option value="" selected="selected" disabled="">- Pilih Mapel -</option>
							@foreach($mapel as $data)
								<option value="{{ $data->id }}">{{ $data->mata_pelajaran }}</option>
							@endforeach
						</select>
                                                                            <label>Berapa Minggu ?</label>
                                                                            <select name="per_minggu" class="form-control select2 selectMinggu" required="required">
                                                                                <option value="">- Berapa Minggu -</option>
                                                                                @for ($i = 1; $i <= 4; $i++)
                                                                                    <option value="{{ $i }}">{{ $i }} Minggu</option>
                                                                                @endfor
                                                                            </select>
						<label>Pilih Guru</label>
						<select class="form-control select2 selectguru" required="required">
							<option value="0" disabled="true" selected="true">- Pilih Guru -</option>
						</select>
                            <label>Kode Guru</label>
                        <input type="text" name="kode_guru" class="form-control kode_guru" disabled="" required="">
                        <input type="hidden" name="kode_guru">
                    </div>
					<div class="form-group">
						<label>Jumlah Jam Pelajaran</label>
                                                                            <div class="input-group">
                                                                                <input type="text" name="jumlah_jp"  disabled="" class="form-control jumlah_jp">
                                                                                <div class="input-group-addon">Jam</div>
                                                                            </div>
                                                                            <input type="hidden" name="jumlah_jp">
                                                                            <input type="hidden" name="jam_mapel" class="jam_mapel">
					</div>

					<div class="form-group">
						<label>Jumlah Jam Kosong</label>
							<div class="row">
								<div class="col-xs-3">
									<label><b>TM</b></label>
									<input type="text" onkeypress="return isNumber(event)" class="form-control" id="TM" name="tm" required="true" maxlength="2">
								</div>
								<div class="col-xs-3">
									<label><b>DP</b></label>
									<input type="text" onkeypress="return isNumber(event)" class="form-control" id="DP" name="dp" required="true" maxlength="2">
								</div>
								<div class="col-xs-3">
									<label><b>TAT</b></label>
									<input type="text" onkeypress="return isNumber(event)" class="form-control" id="TAT" name="tat" required="true" maxlength="2">
								</div>
							</div>
					</div>


					<input type="hidden" name="bulan" value="<?php echo date('F'); ?>">
					<input type="hidden" name="tahun" value="<?php echo date('Y'); ?>">

					<div class="clearfix"></div>

					<button class="btn btn-primary simpan">Simpan</button>
					<a href="{{ route('dashboard.index') }}" class="btn btn-danger">Kembali</a>
                                                                <a href="{{ route('kbm.pdf') }}" class="btn btn-warning pull-right">Print <i class="fa fa-print"></i></a>
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
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$(".selectmapel").on('change',function(){
				var mapel_id = $(this).val();
				// console.log(mapel_id);
				var select = $(this).parent();
				// console.log(select);
				var op =" ";
                                                    var input = $('.jam_mapel');

				$.ajax({
					type: "get",
					url: "{!! route('kbm.id_mapel') !!}",
					data: {'id':mapel_id},
					success: function(data) {
                                                                             input.val(data.mapel.jam_mapel);
						// console.log('Id Mapel');
						// console.log(jumlah_jp);
						// console.log(data.length+" jumlah guru");

						op+='<option value="0" selected disabled>- Pilih Guru -</option>';

						for (var i = 0; i <data.guru.length; i++) {
							op+='<option value="'+data.guru[i].kode_guru+'">' +data.guru[i].nama_guru+ '</option>';
							// console.log(data[i].kode_guru+" id_guru");
						}
						select.find('.selectguru').html(" ");
						select.find('.selectguru').append(op);


					},
					error: function(data) {
						alert('Data Tidak Ditemukan');
					}

				});
    		});

                    $('.selectMinggu').on('change', function() {
                        var jam_mapel = $('.jam_mapel').val();
                        // console.log(jam_mapel);
                        var per_minggu = $(this).val();
                        // console.log(per_minggu);
                        var jumlah_jp = parseFloat(jam_mapel) * parseFloat(per_minggu);
                        // console.log(jumlah_jp);
                        $('.jumlah_jp').val(jumlah_jp);
                    });

    		$(".selectguru").on('change',function(){
				var id_guru = $(this).val();
				// console.log(id_guru+" Id Guru");
				var input = $(this).parent();
				// console.log(select);
				var op =" ";

				$.ajax({
					type: "get",
					url: "{!! route('kbm.kode_guru') !!}",
					data: {'id':id_guru},
					success: function(data) {
						// console.log('kode guru');
						// console.log(data.kode_guru);

						input.find('.kode_guru').val(data.kode_guru);

					},
					error: function(data) {
						alert('Data Tidak Ditemukan');
					}

				});
    		});

    		// ajax Simpan
    		$('.simpan').click(function(e) {
    			e.preventDefault();

    			var action = $("#kbm").find("form").attr("action");
    			var walas_id = {{ Session::get('idwalas') }};
    			var mapel_id =  $("#kbm").find("select[name='mapel']").val();
    			var kode_guru =  $("#kbm").find("input[name='kode_guru']").val();
    			var tm =  $("#kbm").find("input[name='tm']").val();
    			var dp =  $("#kbm").find("input[name='dp']").val();
    			var tat =  $("#kbm").find("input[name='tat']").val();
    			var bulan =  $("#kbm").find("input[name='bulan']").val();
    			var tahun =  $("#kbm").find("input[name='tahun']").val();

                                      var jumlah_jp = $('.jumlah_jp').val();
    			var total_jk = parseFloat(tm) + parseFloat(dp) + parseFloat(tat);
                                      var jumlah_je = parseFloat(jumlah_jp) - parseFloat(total_jk);
    			var persentase_je = (jumlah_je / parseFloat(jumlah_jp)) * 100;
    			// console.log(persentase_je + '  hasil pembulatan =  ' + Math.round(persentase_je));

    			$.ajax({
    				dataType: 'json',
    				type: 'POST',
    				url: action,
    				data: {
    					walas_id: walas_id,
    					mapel_id: mapel_id,
    					kode_guru: kode_guru,
    					jumlah_jp: jumlah_jp,
    					tm: tm,
    					dp: dp,
    					tat: tat,
    					jumlah_je: jumlah_je,
    					total_jk: total_jk,
    					persentase_je: Math.round(persentase_je),
    					bulan: bulan,
    					tahun: tahun
    				},
    				success: function(data){
    					// console.log("berhasil disimpan");
    					toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 6000});
    					$('#kbm')[0].reset();
    				},
    				error: function() {
    					toastr.danger('Data gagal disimpan', 'Danger Alert', {timeOut: 3000});

    				}
    			});
    		});
		});
	</script>
@endsection
