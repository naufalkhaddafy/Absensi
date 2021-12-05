@extends('a_layout.a_template')
@section('title', 'Detail Staff')

@section('content')
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{ url('foto1/' . $users->foto) }}"
                alt="User profile picture">

            <h3 class="profile-username text-center">{{ $users->name }}</h3>

            <p class="text-muted text-center">{{ $users->divisi }}</p>
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Nama</b> <a class="pull-right">{{ $users->name }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="pull-right">{{ $users->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Divisi</b> <a class="pull-right">{{ $users->divisi }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>No.HP</b> <a class="pull-right">{{ $users->nohp }}</a>
                                </li>
                            </ul>
                        </div>
                        <a href="{{ url('/karyawan') }}" style="padding:7px;" class="btn btn-sm btn-success">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
