@extends('templates.app')
@include('templates.token')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Mata Pelajaran <strong>(MaPel)</strong>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#!"></a>Menu</li>
            <li><a href="#!"></a>Mapel</li>
        </ol>
    </section>
        @include('templates.alert')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="btn-group" style="margin-bottom: 10px">
                    <a data-toggle="modal" href='#modal-id' class="btn btn-primary btn-flat">Tambah <i class="fa fa-pencil-square"></i></a>
                    <a href="{{ route('mapel.export', 'xlsx')  }}" class="btn btn-success btn-flat">Export <i class="fa fa-upload"></i></a>
                    <a data-toggle="modal" href='#modal-import' class="btn btn-warning btn-flat">Import <i class="fa fa-download"></i></a>
                    <a href="{{ route('mapel.pdf') }}" class="btn bg-maroon btn-flat">Cetak <i class="fa fa-file-o"></i></a>
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
                        <th>Mata Pelajaran</th>
                        <th>Jam Mapel</th>
                        <th>Actions</th>
                        </thead>
                        <tbody id="row-list">
                        <?php $no = 1; ?>
                        @foreach($mapel as $data)
                            <tr id="row{{ $data->id }}">
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->mata_pelajaran  }}</td>
                                <td>{{ $data->jam_mapel }}</td>
                                <td data-id="{{ $data->id }}">
                                    <a  data-toggle="modal" id="edit" href='#modal-edit' class="btn btn-warning">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('mapel.delete', $data->id) }}" onclick="return confirm('Apakah anda yakin ingin meghapus data ini ?')">Hapus</a>
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
                    <h4 class="modal-title">Data Mapel</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mapel.index')  }}" method="post" id="mapel">
                    <div class="form-group">
                            <label>ID Mapel</label>
                            <?php
                            if (count($mapel) > 0) {
                                $last = $mapel->last();
                                $last = $last->id + 1;
                            }
                             ?>
                            <input type="text" name="id_mapel" class="form-control" disabled="" value="@if(count($mapel) > 0) {{ $last }} @endif">
                        </div>

                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <input type="text" name="mata_pelajaran" class="form-control" placeholder="Mata Pelajaran" required>
                        </div>

                        <div class="form-group">
                                <label>Jam Mata Pelajaran</label>
                            <div class="input-group">
                                <input type="text" onkeypress="return isNumber(event)" class="form-control" name="jam_mapel" required="true" maxlength="2">
                                <div class="input-group-addon"><strong>Jam</strong></div>
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

      {{-- modal Edit --}}
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Data Mapel</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mapel.update')  }}" method="post" id="mapel-edit">
                    <div class="form-group">
                            <label>ID Mapel</label>
                            <input type="text" name="id_mapel" class="form-control" disabled="">
                            <input type="hidden" name="id">
                            <input type="hidden" name="no">
                        </div>

                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <input type="text" name="mata_pelajaran" class="form-control" placeholder="Mata Pelajaran" required>
                        </div>

                        <div class="form-group">
                                <label>Jam Mata Pelajaran</label>
                            <div class="input-group">
                                <input type="text" onkeypress="return isNumber(event)" class="form-control" name="jam_mapel" required="true" maxlength="2">
                                <div class="input-group-addon"><strong>Jam</strong></div>
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
    {{-- modal import --}}
    <div class="modal fade" id="modal-import">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Import data Mapel </h4>
                </div>
                <div class="modal-body">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Perhatikan !  sesuaikan data Mapel seperti gambar di bawah ini.</strong>
                </div>
                <img src="{{ URL::to('images/import_images/mapel_import.png') }}" class="img-responsive" alt="Image">
                    <form action="{{ route('mapel.import') }}" method="post" enctype="multipart/form-data">
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

                var action = $("#mapel").find("form").attr("action");
                var mata_pelajaran =   $("#mapel").find("input[name='mata_pelajaran']").val();
                var jam_mapel = $("#mapel").find("input[name='jam_mapel']").val();
//                 console.log(password);
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: action,
                    data: {
                        mata_pelajaran: mata_pelajaran,
                        jam_mapel: jam_mapel,
                    },
                    success: function(data){
                        toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 5000});

                        // var row = "<tr><td>" + "</td><td>" +data.mata_pelajaran+ "</td><td>" + data.jam_mapel+ "</td><td>" + "<a  data-toggle='modal' id='edit' href='#modal-edit' class='btn btn-warning'>Edit</a>" +
                        //             "<a class='btn btn-danger hapus'>Hapus</a></td></tr>";
                        // $('#row-list').append(row);
                        // $('#modal-id').reset();
                        $('#modal-id').modal('hide');
                        location.href = "{{ route('mapel.index') }}";
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
                var no = $(this).parent('td').prev('td').prev('td').prev('td').text();
                var mata_pelajaran = $(this).parent('td').prev('td').prev('td').text();
                var jam_mapel = $(this).parent('td').prev('td').text();

                $('#modal-edit').find("input[name='id']").val(id);
                $('#modal-edit').find("input[name='no']").val(no);
                $('#modal-edit').find("input[name='id_mapel']").val(id);
                $('#modal-edit').find("input[name='mata_pelajaran']").val(mata_pelajaran);
                $('#modal-edit').find("input[name='jam_mapel']").val(jam_mapel);
            });

            $('.simpan-edit').click(function (e) {
                e.preventDefault();

                $('#mapel-edit').find("input[name='id_mapel']").val();
                var id = $('#mapel-edit').find("input[name='id']").val();
                var no = $('#mapel-edit').find("input[name='no']").val();
                var mata_pelajaran = $('#mapel-edit').find("input[name='mata_pelajaran']").val();
                var jam_mapel = $('#mapel-edit').find("input[name='jam_mapel']").val();
                $.ajax({
                    url: '{{ route('mapel.update') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: id,
                        mata_pelajaran: mata_pelajaran,
                        jam_mapel: jam_mapel,
                        no: no,
                    },
                    success: function(data) {
                        // console.log(data);
                        toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 5000});

                        // var row = '<tr id="row' + id + '"><td>'  + '</td><td>' +data.mata_pelajaran+ '</td><td>' + data.jam_mapel + '</td><td>'
                        //                 + '<a  data-toggle="modal" id="edit" href="#modal-edit" class="btn btn-warning">Edit</a>' +
                        //             '<a class="btn btn-danger hapus">Hapus</a>' +
                        //             '</td></tr>';
                        // $('#row' + data.id).replaceWith(row);
                       //  console.log('.row' + data.id);
                       $('#modal-edit').modal('hide');
                       location.href = "{{ route('mapel.index') }}";
                    }
                });
            });
        });
    </script>
@endsection
