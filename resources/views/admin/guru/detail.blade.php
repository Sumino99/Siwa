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

                        <h3 class="profile-username text-center" id="nama">{{ $guru->nama_guru  }}</h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Kode Guru</b> <b class="pull-right" id="kelas">{{ $guru->kode_guru  }}</b>
                            </li>
                        </ul>

                        <a href="{{ route('guru.index')  }}" class="btn btn-info btn-block"><b>Kembali</b></a>
                        <a href="" class="btn btn-danger btn-block delete"><b>Hapus <i class="fa fa-trash-o"></i></b></a>
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
                                            <td><b>Nama Guru</b></td>
                                            <td>{{ $guru->nama_guru  }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Mata Pelajaran</b></td>
                                            <td>
                                                @if(count($mapel) > 1)
                                                     @foreach($mapel as $key => $value)
                                                    <ul>
                                                        <li>{{ $value->mapel->mata_pelajaran }}</li>
                                                    </ul>
                                                @endforeach
                                                @else
                                                    {{ $guru->mapel->mata_pelajaran }}
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                            <form action="{{ route('guru.update', $guru->kode_guru) }}" class="form-horizontal" action="" method="post" id="walas">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Nama Guru</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="nama_guru" class="form-control" id="inputName" placeholder="Nama Lengkap" value="{{ $guru->nama_guru  }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Kode Guru</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="kode_guru" class="form-control" id="inputName" placeholder="Nama Lengkap" value="{{ $guru->kode_guru  }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Mata Pelajaran</label>

                                    <div class="col-sm-10">
                                        @if(count($mapel) > 1)
                                            @for ($i = 0; $i <count($mapel); $i++)
                                                <select name="mapel_id[{{$i}}]" id="input" class="form-control  select2" style="width: 100% !important;padding: 0" required="required">
                                                    @foreach($mata_pelajaran as $data)
                                                            <option value="{{ $data->id }}" @if($mapel[$i]->mapel_id == $data->id) selected @endif>{{ $data->mata_pelajaran }}</option>
                                                    @endforeach
                                                </select>
                                                <br><br>
                                            @endfor
                                        @else
                                        <select name="mapel_id" id="input" class="form-control" required="required">
                                                @foreach($mata_pelajaran as $data)
                                                        <option value="{{ $data->id }}" @if($data->id == $guru->mapel_id) selected= @endif>{{ $data->mata_pelajaran }}</option>
                                                @endforeach
                                        </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-warning simpan">Simpan</button>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
    </script>
@endsection
