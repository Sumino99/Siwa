@extends('templates.app')
@include('templates.token')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Data Kelas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#!"></a>Menu</li>
        <li><a href="#!"></a>Kelas</li>
      </ol>
    </section>
    @include('templates.alert')
    <section class="content">
    <div class="row">
            <div class="col-xs-12">
                <div class="btn-group" style="margin-bottom: 10px">
                    <a data-toggle="modal" href='#modal-id' class="btn btn-primary btn-flat">Tambah <i class="fa fa-pencil-square"></i></a>
                    <a href="{{ route('kelas.export', 'xlsx')  }}" class="btn btn-success btn-flat">Export <i class="fa fa-upload"></i></a>
                    <a data-toggle="modal" href='#modal-import' class="btn btn-warning btn-flat">Import <i class="fa fa-download"></i></a>
                    <a href="{{ route('kelas.pdf') }}" class="btn bg-maroon btn-flat">Cetak <i class="fa fa-file-o"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kelas</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                  <table id="MyTable" class="table table-hover table-striped table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Nama Gedung</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                      @foreach($kelas as $data)
                            <tr id="row{{ $data->id }}">
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama_kelas }}</td>
                                <td>{{ $data->nama_gedung }}</td>
                                <td data-id="{{ $data->id }}">
                                    <a data-toggle="modal" href='#modal-edit' class="btn btn-warning" id="edit">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('kelas.delete', $data->id) }}" onclick="return confirm('Apakah anda yakin menghapus data ini ?')">Hapus</a>
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
                    <h4 class="modal-title">Data Kelas</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kelas.index')  }}" method="post" id="kelas">
                            <label>Nama Kelas</label>
                        <div class="form-group">
                            <div class="col-xs-4">
                                <select name="kelas" id="" class="form-control">
                                    <option disabled="" selected="">- Pilih Kelas -</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <select name="jurusan" id="" class="form-control">
                                    <option disabled="" selected="">- Pilih Jurusan -</option>
                                    <option value="JB">JB</option>
                                    <option value="ANM">ANM</option>
                                    <option value="RPL">RPL</option>
                                    <option value="MM">MM</option>
                                    <option value="TKJ">TKJ</option>
                                    <option value="APH">APH</option>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <select name="no" id="" class="form-control">
                                    <option disabled="" selected="">- Pilih Prodi -</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Gedung</label>
                            <input type="text" name="nama_gedung" class="form-control" placeholder="Nama Gedung" required="">
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
                    <h4 class="modal-title">Import data Kelas </h4>
                </div>
                <div class="modal-body">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Perhatikan !  sesuaikan data Kelas seperti gambar di bawah ini.</strong>
                </div>
                <img src="{{ URL::to('images/import_images/kelas_import.png') }}" class="img-responsive" alt="Image">
                    <form action="{{ route('kelas.import') }}" method="post" enctype="multipart/form-data">
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
                    <h4 class="modal-title">Data Kelas</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kelas.update')  }}" method="post" id="kelas-edit">
                        <div class="form-group">
                            <label>ID Kelas</label>
                            <input type="hidden" name="id">
                            <input type="text" name="id_kelas" class="form-control" disabled="" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control" disabled="" required>
                        </div>
                                <label>Nama Kelas Baru</label>
                        <div class="form-group">
                            <div class="col-xs-4">
                                <select name="kelas" id="" class="form-control">
                                    <option disabled="" selected="">- Pilih Kelas -</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <select name="jurusan" id="" class="form-control">
                                    <option disabled="" selected="">- Pilih Jurusan -</option>
                                    <option value="JB">JB</option>
                                    <option value="ANM">ANM</option>
                                    <option value="RPL">RPL</option>
                                    <option value="MM">MM</option>
                                    <option value="TKJ">TKJ</option>
                                    <option value="APH">APH</option>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <select name="no" id="" class="form-control">
                                    <option disabled="" selected="">- Pilih Prodi -</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Gedung</label>
                            <input type="text" name="nama_gedung" class="form-control" required="">
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


            // ajax Simpan
            $('.simpan').click(function(e) {
                e.preventDefault();

                var action = $("#kelas").find("form").attr("action");
                var kelas =   $("#kelas").find("select[name='kelas']").val();
                var jurusan =   $("#kelas").find("select[name='jurusan']").val();
                var no =   $("#kelas").find("select[name='no']").val();
                var nama_kelas = kelas + ' ' + jurusan + ' ' + no;
                var nama_gedung = $("#kelas").find("input[name='nama_gedung']").val();
                console.log(nama_kelas) ;
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: action,
                    data: {
                        nama_kelas: nama_kelas,
                        nama_gedung: nama_gedung,
                    },
                    success: function(data){
                        toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 5000});

                        // var row = '<tr id="row"><td>' + '</td><td>' +data.siswa_id+ '</td><td><span class="badge primary">' + data.status+ '</span></td></tr>';
                        // $('#row-list').append(row);
                        // $('#modal-id').reset();
                        $('#modal-id').modal('hide');
                        location.href = "{{ route('kelas.index') }}";
                    },
                    error: function() {
                        console.log('error');
                    }
                });
            });
          // edit ajax
            $('body').on('click', '#edit', function() {
                var id = $(this).parent('td').data('id');
                var nama_kelas = $(this).parent('td').prev('td').prev('td').text();
                var nama_gedung = $(this).parent('td').prev('td').text();
                // console.log(kelas_id);
                $('#modal-edit').find("input[name='id']").val(id);
                $('#modal-edit').find("input[name='id_kelas']").val(id);
                $('#modal-edit').find("input[name='nama_kelas']").val(nama_kelas);
                $('#modal-edit').find("input[name='nama_gedung']").val(nama_gedung);
            });

             $('.simpan-edit').click(function (e) {
                e.preventDefault();

                // var action = $('#siswa-edit').find("form").attr("action");
                var id = $('#kelas-edit').find("input[name='id']").val();
                var kelas_lama = $('#kelas-edit').find("input[name='nama_kelas']").val();
                var kelas =   $("#kelas-edit").find("select[name='kelas']").val();
                var jurusan =   $("#kelas-edit").find("select[name='jurusan']").val();
                var no =   $("#kelas-edit").find("select[name='no']").val();
                var kelas_baru = kelas + ' ' + jurusan + ' ' + no;
                // console.log(kelas_baru);
                $.ajax({
                    url: '{{ route('kelas.update') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: id,
                        nama_kelas: kelas_baru,
                    },
                    success: function(data) {
                        // console.log(data);
                        toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 5000});
//                         var row = '<tr id="row"' + id + '><td>' + '</td><td>' +data.keterangan+ '</td><td><span class="badge primary">' + data.status+ '</span></td></tr>';
//                         $('.row' + data.id).replaceWith(row);
                       $('#modal-edit').modal('hide');
                       location.href = "{{ route('kelas.index') }}";
                    }
                });
                });
        });
    </script>
@endsection
