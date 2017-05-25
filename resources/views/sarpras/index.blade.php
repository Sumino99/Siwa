@extends('templates.app')
@include('templates.token')
@section('content')
	 <section class="content-header">
      <h1>
      	 Data Sarpras
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#!"></a>Menu</li>
        <li><a href="#!"></a>Sarpras</li>
      </ol>
    </section>

    <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<form action="{{ route('sarpras.index') }}" method="POST" role="form" id="sarpras">
				<div class="form-group">
					<label for="">Ruang yang ditempati :</label>
					<input type="text" class="form-control" value="{{ $kelas->nama_gedung }}" disabled="">
                                                        <input type="hidden" name="ruang" value="{{ $kelas->id }}">
				</div>
				<div class="form-group">
					<label for="">Sarpras yang perlu segera diperbaiki</label>
					<input type="text" name="sarpras_rusak" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Keadaan Kelas</label>
					<select name="keadaan_kelas" id="input" class="form-control" required="required">
						<option value="bersih">Bersih</option>
						<option value="kotor">Kotor</option>
					</select>
				</div>
				<button class="btn btn-primary simpan">Simpan</button>
			</form>
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

            // ajax Simpan
            $('.simpan').click(function(e) {
                e.preventDefault();

                var action = $("#sarpras").find("form").attr("action");
                var ruang =  $('#sarpras').find("input[name='ruang']").val();
                var sarpras_rusak =   $("#sarpras").find("input[name='sarpras_rusak']").val();
                var keadaan_kelas =  $("#sarpras").find("select[name='keadaan_kelas']").val();
                var bulan = '{{ date('F') }}';
                var tahun = '{{ date('Y') }}';

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: action,
                    data: {
                        kelas_id: ruang,
                        sarpras_rusak: sarpras_rusak,
                        keadaan_kelas: keadaan_kelas,
                        bulan: bulan,
                        tahun: tahun,
                    },
                    success: function(data){
                        console.log(data);
                        toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 5000});
                       $('#sarpras')[0].reset();
                    },
                    error: function() {
                        console.log('error');
                    }
                });
            });
        });
    </script>
@endsection

