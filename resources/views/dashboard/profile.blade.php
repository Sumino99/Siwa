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

                        <a href="{{ route('dashboard.index')  }}" class="btn btn-info btn-block"><b>Kembali</b></a>
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
