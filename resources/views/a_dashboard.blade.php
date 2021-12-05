@extends('a_layout.a_template')
@section('title', 'Dashboard')

@section('content')

    <body>

        <div class="box box-primary">

            <div style="padding: 20px; text-align: center">
                @if (session('pesan'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                        {{ session('pesan') }}
                    </div>
                @endif
                <h1>Selamat Datang di Aplikasi Absensi</h1>
                <img src="{{ asset('foto') }}/logo sijalu.png" alt="a" class="img-fluid img-thumbnail" alt="a"
                    style="width:330px;height:330px; border: none">
                <h2>{{ Auth::user()->name }}</h2>

            </div>
        </div>
    </body>

@endsection
