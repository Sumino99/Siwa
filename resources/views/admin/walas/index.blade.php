@extends('templates.app')
@include('templates.token')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Wali Kelas
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#!"></a>Menu</li>
            <li><a href="#!"></a>Wali Kelas</li>
        </ol>
        @include('templates.alert')
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="btn-group" style="margin-bottom: 10px">
                    <a data-toggle="modal" href='#modal-id' class="btn btn-primary btn-flat">Tambah <i class="fa fa-pencil-square"></i></a>
                    <a href="{{ route('walas.export', 'xlsx')  }}" class="btn btn-success btn-flat">Export <i class="fa fa-upload"></i></a>
                    <a data-toggle="modal" href='#modal-import' class="btn btn-warning btn-flat">Import <i class="fa fa-download"></i></a>
                    <a href="{{ route('walas.pdf') }}" class="btn bg-maroon btn-flat">Cetak <i class="fa fa-file-o"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Wali Kelas</h3>
                    </div>
                    <div class="box-body">
                    <table id="MyTable" class="table table-hover table-striped table-bordered">
                        <thead>
                        <th>No</th>
                        <th>Nama Walas</th>
                        <th>Kelas</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        @foreach($walas as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data['nama_lengkap'] }}</td>
                                <td>{{ $data['kelas']['nama_kelas']  }}</td>
                                <td>
                                    <a href="{{ route('walas.detail', $data['id']) }}" class="btn btn-info btn-xs">Detail</a>
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

    {{-- modal tambah --}}
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Data Wali Kelas</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('walas.index')  }}" method="post" id="walas">
                        <div class="form-group">
                            <label>Nama Wali Kelas</label>
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Wali Kelas" required>
                        </div>
                        <div class="form-group">
                            <label>Wali Kelas dari</label>
                            <select name="kelas_id" class="form-control select2" style="width: 100% !important;padding: 0" required>
                                <option disabled="" selected="">- Pilih Kelas -</option>
                            @foreach($kelas as $data)
                                    <option value="{{ $data->id  }}">{{ $data->nama_kelas  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Username <button class="btn btn-box-tool" data-toggle="tooltip" title="Kombinasi angka"><i class="fa fa-info-circle"></i></button></label>
                            <input type="text" class="form-control" name="username" onkeypress="return isNumber(event)" placeholder="Username" required maxlength="4">
                        </div>
                        <div class="form-group">
                            <label>Password <button class="btn btn-box-tool" data-toggle="tooltip" title="Kombinasi angka"><i class="fa fa-info-circle"></i></button></label>
                            <input type="text" onkeypress="return isNumber(event)" class="form-control" name="password" placeholder="Password" required maxlength="5">
                        </div>
                        <div class="form-group">
                            <label>No. Hp</label>
                            <input type="text" onkeypress="return isNumber(event)" class="form-control" name="no_hp" placeholder="No. Hp" required maxlength="13">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal import --}}
    <div class="modal fade" id="modal-import">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Import data Walas </h4>
                </div>
                <div class="modal-body">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Perhatikan !  sesuaikan data wali kelas seperti gambar di bawah ini.</strong>
                </div>
                <img src="{{ URL::to('images/import_images/walas_import.png') }}" class="img-responsive" alt="Image">
                    <form action="{{ route('walas.import') }}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Import data</label>
                            <input type="file" class="form-control" name="import_file">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Import</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

                var action = $("#walas").find("form").attr("action");
                var kelas_id =   $("#walas").find("select[name='kelas_id']").val();
                var nama_lengkap =  $("#walas").find("input[name='nama_lengkap']").val();
                var username =  $("#walas").find("input[name='username']").val();
                var password =  $("#walas").find("input[name='password']").val();
                var no_hp = $("#walas").find("input[name='no_hp']").val();
//                 console.log(password);
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: action,
                    data: {
                        kelas_id: kelas_id,
                        nama_lengkap: nama_lengkap,
                        username: username,
                        password: password,
                        no_hp: no_hp
                    },
                    success: function(data){
                        console.log(data);
                        toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 5000});

                        // var row = '<tr id="row"><td>' + '</td><td>' +data.siswa_id+ '</td><td><span class="badge primary">' + data.status+ '</span></td></tr>';
                        // $('#row-list').append(row);
                        // $('#modal-id').reset();
                        $('#modal-id').modal('hide');
                        location.href = "{{ route('walas.index') }}";
                    },
                    error: function() {
                        console.log('error');
                    }
                });
            });
        });
    </script>
@endsection
