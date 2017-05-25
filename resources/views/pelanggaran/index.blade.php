@extends('templates.app')

@include('templates.token')

@section('content')
	<section class="content-header">
      <h1>
      	Data Pelanggaran <small>Bulan <b><?php echo date('F'); ?></b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pelanggaran</li>
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
                <a  data-toggle="modal" href='#modal-id' style="margin-bottom: 20px;" class="btn btn-primary">Tambah Data</a>
                <a href="{{ route('pelanggaran.pdf') }}" class="btn btn-warning pull-right">Print <i class="fa fa-print"></i></a>
                <div class="table-responsive">
                    <table id="MyTable" class="table ">
                        <thead>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Hari/Tanggal</th>
                            <th>Bentuk Pelanggaran</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="row-list">
                        <?php $no = 1; ?>
                            @foreach($pelanggaran as $data)
                                <tr id="row">
                                    <td>{{ $no++ }}</td>
                                    <td data-siswa_id="{{ $data->siswa->id }}">{{ $data->siswa->nama_lengkap }}</td>
                                    <td>{{ $data->tanggal_pelanggaran }}</td>
                                    <td>{{ $data->bentuk_pelanggaran }}</td>
                                    <td>{{ $data->keterangan }}</td>
                                    <td data-id="{{ $data->id }}">
                                        <a  data-toggle="modal" id="edit" href='#modal-edit' class="btn btn-warning">edit</a>
                                        <a class="btn btn-danger" href="{{ route('pelanggaran.delete', $data->id) }}" onclick="return confirm('Apakah anda yakin menghapus data ini ?')">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
    		</div>
    	</div>
    </section>

    {{-- modal tambah --}}
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Siswa Melanggar</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pelanggaran.index') }}" method="post" id="pelanggaran">
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
                    <label>Tanggal Pelanggaran</label>
                    <input type="date" name="tanggal_pelanggaran" id="inputTanggal" class="form-control" required="required" title="">
                </div>
                <div class="form-group">
                    <label>Bentuk Pelanggaran</label>
                    <select name="bentuk_pelanggaran" class="form-control select2" required="required" style="width: 100% !important;padding: 0">
                    	<option value="" disabled="" selected="">- Bentuk Pelanggaran -</option>
                    	<option value="Kerapian">Kerapian</option>
                    	<option value="Proses KBM">Proses KBM</option>
                    	<option value="Atribut Seragam">Atribut Seragam</option>
                    	<option value="Rambut">Rambut</option>
                    	<option value="Kesopanan">Kesopanan</option>
                    	<option value="Sikap">Sikap</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Keterangan dan Lain - lain</label>
                    <textarea name="keterangan" class="form-control"></textarea>
                </div>
                <input type="hidden" name="bulan" value="<?php echo date('F'); ?>">
                <input type="hidden" name="tahun" value="<?php echo date('Y'); ?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary simpan">Simpan</button>
                </form>
                </div>
            </div>
        </div>
    </div>
 {{-- modal Edit --}}
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Siswa Pelanggaran</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="edit-spp">
                <div class="form-group">
                    <label>Pilih Siswa</label>
                    <input type="hidden" name="id">
                    <select name="siswa_id" id="siswa_id" class="form-control select2" style="width: 100% !important;padding: 0">
                        <option disabled="" selected="">- Pilih Siswa -</option>
                        @foreach($siswa as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Pelanggaran</label>
                    <input type="date" name="tanggal_pelanggaran" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label>Bentuk Pelanggaran</label>
                    <select id="bentuk_pelanggaran" name="bentuk_pelanggaran" class="form-control" required="required">
                        <option value="" disabled="" selected="">- Bentuk Pelanggaran -</option>
                        <option value="Kerapian">Kerapian</option>
                        <option value="Proses KBM">Proses KBM</option>
                        <option value="Atribut Seragam">Atribut Seragam</option>
                        <option value="Rambut">Rambut</option>
                        <option value="Kesopanan">Kesopanan</option>
                        <option value="Sikap">Sikap</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Keterangan dan Lain - lain</label>
                    <textarea name="keterangan" class="form-control" required="true" data-error="Keterangan tidak boleh kosong !"></textarea>
                </div>
                <input type="hidden" name="bulan" value="<?php echo date('F'); ?>">
                <input type="hidden" name="tahun" value="<?php echo date('Y'); ?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary simpan-edit">Simpan</button>
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

                var action = $("#pelanggaran").find("form").attr("action");
                var kelas_id =  {{ Session::get('kelas_id') }};
                var siswa_id =   $("#pelanggaran").find("select[name='siswa_id']").val();
                var tanggal_pelanggaran =  $("#pelanggaran").find("input[name='tanggal_pelanggaran']").val();
                var keterangan =  $("#pelanggaran").find("textarea[name='keterangan']").val();
                var bentuk_pelanggaran =  $("#pelanggaran").find("select[name='bentuk_pelanggaran']").val();
                var bulan = $("#pelanggaran").find("input[name='bulan']").val();
                var tahun = $("#pelanggaran").find("input[name='tahun']").val();
                // var jumlah = parseFloat(sakit) + parseFloat(ijin) + parseFloat(absen);

                // console.log(data.length);
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: action,
                    data: {
                        kelas_id: kelas_id,
                        siswa_id: siswa_id,
                        tanggal_pelanggaran: tanggal_pelanggaran,
                        keterangan: keterangan,
                        bentuk_pelanggaran: bentuk_pelanggaran,
                        bulan: bulan,
                        tahun: tahun,
                    },
                    success: function(data){
                        toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 5000});
                        location.href = "{{ route('pelanggaran.index') }}";
                    },
                    error: function() {
                        console.log('error');
                    }
                });
            });

            // edit ajax
            $('body').on('click', '#edit', function() {
                var id = $(this).parent('td').data('id');
                var nama_siswa = $(this).parent('td').prev('td').prev('td').prev('td').prev('td').data('siswa_id');
                var tanggal_pelanggaran = $(this).parent('td').prev('td').prev('td').prev('td').text();
                var bentuk_pelanggaran = $(this).parent('td').prev('td').prev('td').text();
                var keterangan = $(this).parent('td').prev('td').text();
                // console.log(nama_siswa + ' ' + tanggal_pelanggaran + ' ' + bentuk_pelanggaran + ' ' + keterangan);
                $("#modal-edit").find("input[name='id']").val(id);
                $('#siswa_id').val(nama_siswa).change();
                $('#modal-edit').find("input[name='tanggal_pelanggaran']").val(tanggal_pelanggaran);
                $('#bentuk_pelanggaran').val(bentuk_pelanggaran).change();
                $('#modal-edit').find("textarea[name='keterangan']").val(keterangan);
            });

            $('.simpan-edit').click(function (e) {
                e.preventDefault();
                var id = $('#edit-spp').find("input[name='id']").val();
                var nama_siswa = $('#edit-spp').find("input[name='siswa_id']").val();
                var tanggal_pelanggaran = $('#edit-spp').find("input[name='tanggal_pelanggaran']").val();
                var bentuk_pelanggaran = $('#edit-spp').find("select[name='bentuk_pelanggaran']").val();
                var keterangan = $('#edit-spp').find("textarea[name='keterangan']").val();
                // console.log(action + bulan_tunggak +)
                $.ajax({
                    url: '{{ route("pelanggaran.update") }}',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        id: id,
                        nama_siswa: nama_siswa,
                        tanggal_pelanggaran: tanggal_pelanggaran,
                        bentuk_pelanggaran: bentuk_pelanggaran,
                        keterangan: keterangan,
                    },
                    success: function(data) {
                        toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 5000});
                        location.href = "{{ route('pelanggaran.index') }}";
                    }
                });

            });
        });
    </script>
@endsection
