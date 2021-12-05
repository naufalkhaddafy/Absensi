@extends('a_layout.a_template')
@section('title', 'Profile')

@section('content')

    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{ url('foto1/' . Auth::user()->foto) }}"
                alt="User profile picture">

            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
            <p class="text-muted text-center">{{ Auth::user()->divisi }}</p>
            @if (session('pesan'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                    {{ session('pesan') }}
                </div>
            @endif
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Profile</a></li>
                        <li><a href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Nama</b> <b class="pull-right">{{ Auth::user()->name }}</b>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <b class="pull-right">{{ Auth::user()->email }}</b>
                                </li>
                                <li class="list-group-item">
                                    <b>Divisi</b> <b class="pull-right">{{ Auth::user()->divisi }}</b>
                                </li>
                                <li class="list-group-item">
                                    <b>No.HP</b> <b class="pull-right">{{ Auth::user()->nohp }}</b>
                                </li>

                            </ul>
                        </div>
                        <div class="tab-pane" id="settings">

                            <form class="form-horizontal" method="POST"
                                action="{{ url('/profile/update/' . Auth::user()->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Nama</label>

                                    <div class="col-sm-8">
                                        <input id="name" type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ Auth::user()->name }}" autocomplete="name" autofocus
                                            placeholder="Masukan Nama">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-8">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ Auth::user()->email }}" autocomplete="email"
                                            placeholder="Masukan Email" readonly>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Divisi</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="divisi" class="form-control" id="inputName"
                                            value="{{ Auth::user()->divisi }}" placeholder="Masukan Divisi">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">No.HP</label>

                                    <div class="col-sm-8">
                                        <input type="text" name="nohp" class="form-control" id="inputName"
                                            value="{{ Auth::user()->nohp }}" placeholder="Masukan No.HP">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">{{ __('Password') }}</label>
                                    <div class="col-sm-8">
                                        <input id="password" type="password" placeholder="Masukan Password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm"
                                        class="col-sm-2 control-label">{{ __('Confirm Password') }}</label>
                                    <div class="col-sm-8">
                                        <input id="password-confirm" type="password" class="form-control"
                                            placeholder="Confirm Password" name="password_confirmation" required
                                            autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputfile" class="col-sm-2 control-label">Input Foto</label>
                                    <input type="file" name="foto" class="col-sm-10"
                                        style="padding-top: 10px;padding-bottom: 30px" id="inputfile">
                                </div>
                                <div style="display: none" class="form-group">
                                    <label for="level" class="col-sm-2 control-label">Level</label>
                                    <div class="col-sm-8">
                                        <select name="level" id="inputState" class="form-control">
                                            @if (Auth::user()->level == 'admin')
                                                <option value="admin" selected="selected">
                                                    Admin
                                                </option>
                                                <option value="user">
                                                    User
                                                </option>
                                            @elseif(Auth::user()->level=='user')
                                                <option selected="selected" value="user">
                                                    User
                                                </option>
                                                <option value="admin">
                                                    Admin
                                                </option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button id="btnSubmit" type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
