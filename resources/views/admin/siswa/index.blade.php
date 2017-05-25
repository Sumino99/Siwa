@extends('templates.app')
@include('templates.token')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Data Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#!"></a>Menu</li>
        <li><a href="#!"></a>Siswa</li>
      </ol>
    </section>
    @include('templates.alert')
    <section class="content">
    <div class="row">
            <div class="col-xs-12">
                <div class="btn-group" style="margin-bottom: 10px">
                    <a data-toggle="modal" href='#modal-id' class="btn btn-primary btn-flat">Tambah <i class="fa fa-pencil-square"></i></a>
                    <a href="{{ route('siswa.export', 'xlsx')  }}" class="btn btn-success btn-flat">Export <i class="fa fa-upload"></i></a>
                    <a data-toggle="modal" href='#modal-import' class="btn btn-warning btn-flat">Import <i class="fa fa-download"></i></a>
                    <a href="{{ route('siswa.pdf') }}" class="btn bg-maroon btn-flat">Cetak <i class="fa fa-file-o"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Siswa</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                  <table id="MyTable" class="table table-hover table-striped table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                      @foreach($siswa as $data)
                            <tr id="row{{ $data->id }}">
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama_lengkap }}</td>
                                <td data-id="{{ $data->kelas->id  }}">{{ $data->kelas->nama_kelas }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td data-id="{{ $data->id }}">
                                    <a data-toggle="modal" href='#modal-edit' class="btn btn-warning" id="edit">Edit</a>
                                    <a href="{{ route('siswa.delete', $data->id)  }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini ? ')">Hapus</a>
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
                    <h4 class="modal-title">Data Siswa</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('siswa.adminIndex')  }}" method="post" id="siswa">
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Siswa" required>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="kelas_id" class="form-control select2" style="width: 100% !important;padding: 0" required>
                                <option disabled="" selected="">- Pilih Kelas -</option>
                            @foreach($kelas as $data)
                                    <option value="{{ $data->id  }}">{{ $data->nama_kelas  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="jenis_kelamin" id="inputL" value="L">
                                Laki - Laki
                            </label>
                              <label>
                                <input type="radio" name="jenis_kelamin" id="inputP" value="P">
                                Perempuan
                            </label>
                        </div>
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
                    <strong>Perhatikan !  sesuaikan data Siswa seperti gambar di bawah ini.</strong>
                </div>
                <img src="{{ URL::to('images/import_images/siswa_import.png') }}" class="img-responsive" alt="Image">
                    <form action="{{ route('siswa.import') }}" method="post" enctype="multipart/form-data">
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

    {{-- modal edit --}}
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Data Siswa</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('siswa.update')  }}" method="post" id="siswa-edit">
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="hidden" name="id">
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Siswa" required>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select id="kelas" name="kelas_id" class="form-control select2" style="width: 100% !important;padding: 0" required>
                            <option disabled="" selected="">- Pilih Kelas -</option>
                            @foreach($kelas as $data)
                                    <option value="{{ $data->id  }}">{{ $data->nama_kelas  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="jenis_kelamin" id="inputL" value="L">
                                Laki - Laki
                            </label>
                              <label>
                                <input type="radio" name="jenis_kelamin" id="inputP" value="P">
                                Perempuan
                            </label>
                        </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary simpan-edit">Simpan</button>
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


            });
            // ajax Simpan
            $('.simpan').click(function(e) {
                e.preventDefault();

                var action = $("#siswa").find("form").attr("action");
                var kelas_id =   $("#siswa").find("select[name='kelas_id']").val();
                var nama_lengkap =  $("#siswa").find("input[name='nama_lengkap']").val();
                var jenis_kelamin =  $("#siswa").find("input[name='jenis_kelamin']").val();
                console.log(nama_lengkap);
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: action,
                    data: {
                        kelas_id: kelas_id,
                        nama_lengkap: nama_lengkap,
                        jenis_kelamin: jenis_kelamin
                    },
                    success: function(data){
                        console.log(data);
                        toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 5000});

                        // var row = '<tr id="row"><td>' + '</td><td>' +data.siswa_id+ '</td><td><span class="badge primary">' + data.status+ '</span></td></tr>';
                        // $('#row-list').append(row);
                        // $('#modal-id').reset();
                        $('#modal-id').modal('hide');
                        location.href = "{{ route('siswa.adminIndex') }}";
                    },
                    error: function() {
                        console.log('error');
                    }
                });
            });
          // edit ajax
            $('body').on('click', '#edit', function() {
                var id = $(this).parent('td').data('id');
                var nama_siswa = $(this).parent('td').prev('td').prev('td').prev('td').text();
                var kelas_id = $(this).parent('td').prev('td').prev('td').data('id');
                var jenis_kelamin = $(this).parent('td').prev('td').text();
                // console.log(kelas_id);
                $('#modal-edit').find("input[name='id']").val(id);
                $('#modal-edit').find("input[name='nama_lengkap']").val(nama_siswa);
                $('#kelas').val(kelas_id).change();
                $('#modal-edit').find("input[name='jenis_kelamin'][value=" + jenis_kelamin +"]").attr('checked', 'checked');
            });

             $('.simpan-edit').click(function (e) {
                e.preventDefault();

                // var action = $('#siswa-edit').find("form").attr("action");
                var id = $('#siswa-edit').find("input[name='id']").val();
                var nama_lengkap = $('#siswa-edit').find("input[name='nama_lengkap']").val();
                var kelas_id = $('#siswa-edit').find("select[name='kelas_id']").val();
                var jenis_kelamin = $('#siswa-edit').find("input[name='jenis_kelamin']").val();
                // console.log(action + bulan_tunggak +)
                $.ajax({
                    url: '{{ route('siswa.update') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: id,
                        nama_lengkap: nama_lengkap,
                        kelas_id: kelas_id,
                        jenis_kelamin: jenis_kelamin,
                    },
                    success: function(data) {
                        console.log(data);
                        toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 5000});

//                         var row = '<tr id="row"' + id + '><td>' + '</td><td>' +data.keterangan+ '</td><td><span class="badge primary">' + data.status+ '</span></td></tr>';
//                         $('.row' + data.id).replaceWith(row);
                       $('#modal-edit').modal('hide');
                       location.href = "{{ route('siswa.adminIndex') }}";
                    }
                });
                });
        });
    </script>
@endsection
