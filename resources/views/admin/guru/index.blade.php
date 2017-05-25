@extends('templates.app')
@include('templates.token')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Data Guru
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#!"></a>Menu</li>
        <li><a href="#!"></a>Guru</li>
      </ol>
    </section>
    @include('templates.alert')
    <section class="content">
    <div class="row">
            <div class="col-xs-12">
                <div class="btn-group" style="margin-bottom: 10px">
                    <a data-toggle="modal" href='#modal-id' class="btn btn-primary btn-flat">Tambah <i class="fa fa-pencil-square"></i></a>
                    <a href="{{ route('guru.export', 'xlsx')  }}" class="btn btn-success btn-flat">Export <i class="fa fa-upload"></i></a>
                    <a data-toggle="modal" href='#modal-import' class="btn btn-warning btn-flat">Import <i class="fa fa-download"></i></a>
                    <a href="{{ route('guru.pdf') }}" class="btn bg-maroon btn-flat">Cetak <i class="fa fa-file-o"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Guru</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                  <table id="MyTable" class="table table-hover table-striped table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>Kode Guru</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                      @foreach($guru as $data)
                            <tr id="row{{ $data['id'] }}">
                                <td>{{ $no++ }}</td>
                                <td>{{ $data['nama_guru'] }}</td>
                                <td data-mapel="{{ $data['mapel']['id'] }}">{{ $data['mapel']['mata_pelajaran'] }}</td>
                                <td><span class="badge">{{ $data['kode_guru'] }}</span></td>
                                <td data-id="{{ $data['id'] }}">
                                    {{-- <a href="{{ route('guru.detail', $data->kode_guru) }}" class="btn btn-primary">Detail</a> --}}
                                    <a  data-toggle="modal" id="edit" href='#modal-edit' class="btn btn-warning">edit</a>
                                    <a class="btn btn-danger" href="{{ route('guru.delete', $data['id']) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')">Hapus</a>
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
                    <h4 class="modal-title">Data Guru</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('guru.index')  }}" method="post" id="guru">
                       <div class="form-group">
                            <label>Kode Guru</label>
                            <input type="text" name="kode_guru" class="form-control" onkeypress="return isNumber(event)" placeholder="Kode Guru" required maxlength="2">
                        </div>
                        <div class="form-group">
                            <label>Nama Guru</label>
                            <input type="text" name="nama_guru" class="form-control" placeholder="Nama Guru" required>
                        </div>
                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <select class="form-control select2" name="mapel_id" style="width: 100% !important;padding: 0">
                                <option disabled="" selected="">- Pilih Mata Pelajaran -</option>
                                @foreach($mapel as $data)
                                    <option value="{{ $data->id }}">{{ $data->mata_pelajaran }}</option>
                                @endforeach
                            </select>
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

    {{-- modal Edit --}}
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Data Guru</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('guru.index')  }}" method="post" id="guru-edit">
                       <div class="form-group">
                            <label>Kode Guru</label>
                            <input type="hidden" name="id">
                            <input type="text" name="kode_guru" class="form-control" onkeypress="return isNumber(event)" placeholder="Kode Guru" required maxlength="2">
                        </div>
                        <div class="form-group">
                            <label>Nama Guru</label>
                            <input type="text" name="nama_guru" class="form-control" placeholder="Nama Guru" required>
                        </div>
                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <select class="form-control select2" name="mapel_id" id="mapel_id" style="width: 100% !important;padding: 0">
                                <option disabled="" selected="">- Pilih Mata Pelajaran -</option>
                                @foreach($mapel as $data)
                                    <option value="{{ $data->id }}">{{ $data->mata_pelajaran }}</option>
                                @endforeach
                            </select>
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

    {{-- modal import --}}
    <div class="modal fade" id="modal-import">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Import data Guru </h4>
                </div>
                <div class="modal-body">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Perhatikan !  sesuaikan data Siswa seperti gambar di bawah ini.</strong>
                </div>
                <img src="{{ URL::to('images/import_images/guru_import.png') }}" class="img-responsive" alt="Image">
                    <form action="{{ route('guru.import') }}" method="post" enctype="multipart/form-data">
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

                var action = $("#guru").find("form").attr("action");
                var kode_guru =  $("#guru").find("input[name='kode_guru']").val();
                var nama_guru =  $("#guru").find("input[name='nama_guru']").val();
                var mapel_id =   $("#guru").find("select[name='mapel_id']").val();
                // console.log(nama_lengkap);
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: action,
                    data: {
                        kode_guru: kode_guru,
                        nama_guru: nama_guru,
                        mapel_id: mapel_id
                    },
                    success: function(data){
                        // console.log(data);
                        toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 5000});

                        // var row = '<tr id="row"><td>' + '</td><td>' +data.siswa_id+ '</td><td><span class="badge primary">' + data.status+ '</span></td></tr>';
                        // $('#row-list').append(row);
                        // $('#modal-id').reset();
                        $('#modal-id').modal('hide');
                        location.href = "{{ route('guru.index') }}";
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
                var nama_guru = $(this).parent('td').prev('td').prev('td').prev('td').text();
                var mata_pelajaran = $(this).parent('td').prev('td').prev('td').data('mapel');
                var kode_guru = $(this).parent('td').prev('td').text();

                $('#modal-edit').find("input[name='id']").val(id);
                $('#modal-edit').find("input[name='kode_guru']").val(kode_guru);
                $('#modal-edit').find("input[name='nama_guru']").val(nama_guru);
                $('#mapel_id').val(mata_pelajaran).change();
            });

            $('.simpan-edit').click(function (e) {
                e.preventDefault();

                var id = $('#guru-edit').find("input[name='id']").val();
                var kode_guru = $('#guru-edit').find("input[name='kode_guru']").val();
                var nama_guru = $('#guru-edit').find("input[name='nama_guru']").val();
                var mapel_id = $('#guru-edit').find("select[name='mapel_id']").val();
                $.ajax({
                    url: '{{ route('guru.update') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: id,
                        kode_guru: kode_guru,
                        nama_guru: nama_guru,
                        mapel_id: mapel_id,
                    },
                    success: function(data) {
                        console.log(data);
                        toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 5000});

//                         var row = '<tr id="row"' + id + '><td>' + '</td><td>' +data.keterangan+ '</td><td><span class="badge primary">' + data.status+ '</span></td></tr>';
//                         $('.row' + data.id).replaceWith(row);
                       $('#modal-edit').modal('hide');
                       location.href = "{{ route('guru.index') }}";
                    }
                });
            });
        });
    </script>
@endsection
