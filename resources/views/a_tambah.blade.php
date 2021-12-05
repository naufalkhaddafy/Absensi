@extends('a_layout.a_template')
@section('title', 'Tambah User')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h5 class="box-title">Masukan Data Pengguna</h5>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" method="POST" action="{{ url('/tambah/insert') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nama</label>

                                <div class="col-sm-8">
                                    <input id="name" type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Masukan Email">
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
                                        placeholder="Masukan Divisi">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">No.HP</label>

                                <div class="col-sm-8">
                                    <input type="text" name="nohp" class="form-control" id="inputName"
                                        placeholder="Masukan No.HP">
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
                                <label for="level" class="col-sm-2 control-label">Level</label>
                                <div class="col-sm-8">
                                    <select name="level" id="inputState" class="form-control">
                                        <option selected>Pilih Status Pengguna</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputfile" class="col-sm-2 control-label">Input Foto</label>
                                <input type="file" name="foto" class="col-sm-10"
                                    style="padding-top: 10px;padding-bottom: 30px" id="inputfile">
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <a href="{{ url('/karyawan') }}" style="padding:7px;" class="btn btn-sm btn-danger">
                                        Kembali
                                    </a>
                                    <button type="submit" id="btnSubmit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
