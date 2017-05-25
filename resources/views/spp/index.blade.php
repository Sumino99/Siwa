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
              <h3 class="box-title">Kelas : <b>{{ Session::get('nama_kelas') }}</b></h3>
            </div>
            <div class="box-body">
                <a  data-toggle="modal" href='#modal-id' style="margin-bottom: 20px;" class="btn btn-primary">Tambah Data</a>
                <div class="table-responsive">
                    <table id="MyTable" class="table ">
                        <thead>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>menunggak</th>
                            <th>keterangan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="row-list">
                        <?php $no = 1; ?>
                            @foreach($spp as $data)
                                <tr id="row{{ $data->id }}">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->siswa->nama_lengkap }}</td>
                                    <td data-tunggak='{{ $data->bulan_tunggak }}'>{{ $data->bulan_tunggak }} Bln</td>
                                    <td>{{ $data->keterangan }}</td>
                                    <td>
                                        <span class="badge primary">{{ $data->status }}</span>
                                    </td>
                                    <td data-id="{{ $data->id }}">
                                        <a  data-toggle="modal" id="edit" href='#modal-edit' class="btn btn-warning">edit</a>
                                        <a class="btn btn-danger" href="{{ route('spp.delete', $data->id) }}" onclick="return confirm('Apakah anda yakin menghapus data ini ?')">Hapus</a>
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
                    <h4 class="modal-title">Siswa Menunggak</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('spp.index') }}" method="post" id="spp">
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
                    <div class="input-group">
                        <input type="text" name="bulan_tunggak" onkeypress="return isNumber(event)" class="form-control" maxlength="2" required="true">
                        <div class="input-group-addon">bulan</div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" required="true"></textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required="true">
                        <option value="menunggak" selected="">Menunggak</option>
                        <option value="lunas" disabled="">Lunas</option>
                    </select>
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
                    <h4 class="modal-title">Edit Siswa Menunggak</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="edit-spp">
                <div class="form-group">
                    <label>Pilih Siswa</label>
                    <input type="text" name="siswa_id" class="form-control" disabled>
                    <input type="hidden" name="id">
                </div>
                <div class="form-group">
                    <label>Menunggak Selama</label>
                    <div class="input-group">
                        <input type="text" name="bulan_tunggak" onkeypress="return isNumber(event)" class="form-control" maxlength="2" required="true" data-error="Tunggakan tidak boleh kosong !">
                        <div class="input-group-addon">bulan</div>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" required="true" data-error="Keterangan tidak boleh kosong !"></textarea>
                    <div class="help-block with-errors"></div>
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

                var action = $("#spp").find("form").attr("action");
                var kelas_id =  {{ Session::get('kelas_id') }};
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
                        console.log(data.siswa);
                        toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 5000});

                        // var row = '<tr id="row"><td>' + '</td><td>' +data.siswa_id+ '</td><td><span class="badge primary">' + data.status+ '</span></td></tr>';
                        // $('#row-list').append(row);
                       // $('#modal-id').reset();
                       $('#modal-id').modal('hide');
                       location.href = "{{ route('spp.index') }}";
                    },
                    error: function() {
                        console.log('error');
                    }
                });
            });

            // edit ajax
            $('body').on('click', '#edit', function() {
                var id = $(this).parent('td').data('id');
                // console.log(id);
                var nama_siswa = $(this).parent('td').prev('td').prev('td').prev('td').prev('td').text();
                var bulan_tunggak = $(this).parent('td').prev('td').prev('td').prev('td').data('tunggak');
                var keterangan = $(this).parent('td').prev('td').prev('td').text();

                $('#modal-edit').find("input[name='id']").val(id);
                $('#modal-edit').find("input[name='siswa_id']").val(nama_siswa);
                $('#modal-edit').find("input[name='bulan_tunggak']").val(bulan_tunggak);
                $('#modal-edit').find("textarea[name='keterangan']").val(keterangan);
                $('#modal-edit').find("form").attr('action', '/spp/' + id);
            });

            $('.simpan-edit').click(function (e) {
                e.preventDefault();

                var action = $('#edit-spp').find("form").attr("action");
                var id = $('#edit-spp').find("input[name='id']").val();
                var siswa_id = $('#edit-spp').find("input[name='siswa_id']").val();
                var kelas_id = {{ Session::get('kelas_id') }};
                var bulan_tunggak = $('#edit-spp').find("input[name='bulan_tunggak']").val();
                var keterangan = $('#edit-spp').find("textarea[name='keterangan']").val();
                var status = $('#edit-spp').find("select[name='status']").val();
                // console.log(action + bulan_tunggak +)
                $.ajax({
                    url: '{{ route('spp.update') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: id,
                        siswa_id: siswa_id,
                        kelas_id: kelas_id,
                        bulan_tunggak: bulan_tunggak,
                        keterangan: keterangan,
                        status: status,
                    },
                    success: function(data) {
                        console.log(data);
                        toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 5000});

//                         var row = '<tr id="row"' + id + '><td>' + '</td><td>' +data.keterangan+ '</td><td><span class="badge primary">' + data.status+ '</span></td></tr>';
//                         $('.row' + data.id).replaceWith(row);
                       $('#modal-edit').modal('hide');
                       location.href = "{{ route('spp.index') }}";
                    }
                });
            });
        });
    </script>
@endsection
