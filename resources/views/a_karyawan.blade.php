@extends('a_layout.a_template')
@section('title', 'Data Staff')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->
                <div class="box box-primary">
                    <div class="box-body">
                        @if (session('pesan'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                                {{ session('pesan') }}
                            </div>
                        @endif
                        <a href="{{ url('/tambah') }}" class="btn btn-sm btn-success m-3">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                            Tambah
                        </a>
                        <br></br>
                        <table id="tb" class="display responsive nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Foto</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($users as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td><select size="1" id="row-1-office" name="row-1-office">
                                                @if ($data->level == 'admin')
                                                    <option value="admin" selected="selected">
                                                        Admin
                                                    </option>
                                                    <option value="user">
                                                        User
                                                    </option>
                                                @elseif($data->level == 'user')
                                                    <option selected="selected" value="user">
                                                        User
                                                    </option>
                                                    <option value="admin">
                                                        Admin
                                                    </option>
                                                @endif
                                            </select></td>
                                        <td></td>
                                        <td>
                                            <a href="{{ url('/karyawan/detail/' . $data->id) }}"
                                                class="btn btn-sm btn-success">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </a>
                                            <a href="{{ url('/karyawan/edit/' . $data->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            <a class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="{{ url('#delete' . $data->id) }}">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @foreach ($users as $data)
                            <div class="modal fade" id="delete{{ $data->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda ingin menghapus {{ $data->name }}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left"
                                                data-dismiss="modal">Cancel</button>
                                            <a href="{{ url('/karyawan/delete/' . $data->id) }}" class="btn btn-danger">
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
