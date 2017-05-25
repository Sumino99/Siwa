@extends('templates.app')
@include('templates.token')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ URL::to('images/no_user.jpg') }}" alt="User profile picture">

                        <h3 class="profile-username text-center" id="nama">{{ $walas->nama_lengkap  }}</h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Wali Kelas</b> <b class="pull-right" id="kelas">{{ $walas->kelas->nama_kelas  }}</b>
                            </li>
                        </ul>

                        <a href="{{ route('walas.index')  }}" class="btn btn-info btn-block"><b>Kembali</b></a>
                        <a href="{{ route('walas.delete', $walas->id)  }}" class="btn btn-danger btn-block" onclick="return confirm('Apakah anda yakin menghapus data ini ? ')"><b>Hapus <i class="fa fa-trash-o"></i></b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Biodata</a></li>
                        <li><a href="#settings" data-toggle="tab">Edit</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div>
                                <table class="table table-bordered">
                                    <tbody id="row">
                                        <tr>
                                            <td>Username</td>
                                            <td>{{ $walas->username  }}</td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td>{{ $walas->password  }}</td>
                                        </tr>
                                        <tr>
                                            <td>No. Hp</td>
                                            <td>{{ $walas->no_hp  }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal" action="{{ route('walas.update', $walas->id)  }}" method="post" id="walas">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Nama Lengkap</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="nama_lengkap" class="form-control" id="inputName" placeholder="Nama Lengkap" value="{{ $walas->nama_lengkap  }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Kelas</label>

                                    <div class="col-sm-10">
                                        <select name="kelas_id" id="" class="form-control select2" style="width: 100% !important;padding: 0">
                                            @foreach($kelas as $data)
                                                <option value="{{ $data->id  }}" @if($data->id == $walas->kelas_id) selected @endif>
                                                    {{ $data->nama_kelas  }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Username</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="username" class="form-control" id="inputEmail" placeholder="Username" value="{{ $walas->username  }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" name="password" class="col-sm-2 control-label">Password</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" name="password" placeholder="Password" value="{{ $walas->password  }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">No. HP</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="no_hp" id="inputSkills" placeholder="No. HP" value="{{ $walas->no_hp  }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="hidden" name="id" value="{{ $walas->id  }}">
                                        <button type="submit" class="btn btn-warning simpan">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
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

                var action = $("#walas").find("form").attr("action");
                var nama_lengkap =  $("#walas").find("input[name='nama_lengkap']").val();

                var kelas_id =  $("#walas").find("select[name='kelas_id']").val();
//                console.log(nama_kelas);
                var username =  $("#walas").find("input[name='username']").val();
                var password =  $("#walas").find("input[name='password']").val();
                var no_hp =  $("#walas").find("input[name='no_hp']").val();
                var id = $("#walas").find("input[name='id']").val();
//                console.log(nama_lengkap);
                 $.ajax({
                 	dataType: 'json',
                 	type: 'POST',
                 	url: action,
                 	data: {
                        id: id,
                        nama_lengkap: nama_lengkap,
                        username: username,
                        password: password,
                        no_hp: no_hp,
                        kelas_id: kelas_id,
                 	},
                 	success: function(data){
                 		// console.log("berhasil disimpan");
                 		toastr.success('Data berhasil disimpan', 'Success Alert', {timeOut: 3000});
                        var nilai = '<tbody id="row">' + '<tr><td>Username</td><td>' + data.username + '</td></tr>' +
                                '<tr><td>Password</td><td>' + data.password + '</td></tr>' +
                                '<tr><td>No. Hp</td><td>' + data.no_hp + '</td></tr>';
                        var nama =  '<h3 class="profile-username text-center" id="nama">'+ data.nama_lengkap +'</h3>';
                        var kelas_id =  '<b class="pull-right" id="kelas">' + data.kelas_id + '</b>';
                        $('#row').replaceWith(nilai);
                        $('#nama').replaceWith(nama);
                        $('#kelas').replaceWith(kelas_id);
                    },
                 	error: function() {
                 		toastr.danger('Data gagal disimpan', 'Danger Alert', {timeOut: 3000});
                 	}
                 });
            });
        });
    </script>
@endsection
