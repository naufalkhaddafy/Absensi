@extends('a_layout.a_template')
@section('title', 'Rekapan Absensi')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                            <i class="fa fa-save"></i> Excel
                        </button>
                        <button type="button" class="btn btn-danger pull-right" data-toggle="modal"
                            data-target="#modal-delete">
                            <i class="glyphicon glyphicon-trash"></i> Delete
                        </button>
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Download Excel</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tentukan tanggal yang ingin anda download excel?</p>
                                        <label for="tglawal">Dari Tanggal:</label>
                                        <input type="date" id="tglawal" name="tglawal" required><br><br>
                                        <label for="tglakhir">Sampai Tanggal :</label>
                                        <input type="date" id="tglakhir" name="tglakhir" required><br><br>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left"
                                            data-dismiss="modal">Close</button>
                                        <a href="" target=" _blank"
                                            onclick="this.href='{{ url('/excel') }}'+'/'+ document.getElementById('tglawal').value +'/'+document.getElementById('tglakhir').value"
                                            class=" btn btn-success">
                                            Download
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-delete">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda ingin menghapus Data Rekapan?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left"
                                            data-dismiss="modal">Cancel</button>
                                        <a href="{{ url('/deleterekapan') }}" class="btn btn-danger">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <br></br>
                        <table id="tb" class="display responsive nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th>Tanggal </th>
                                    <th>Jam </th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>Pekerjaan yang dilaksanakan</th>
                                    <th>Foto</th>
                                    <th>Lokasi Absensi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rekap as $data)
                                    <tr>
                                        <td><?= date('d F Y', strtotime($data->created_at)) ?></td>
                                            <td>{{ $data->jam }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->keterangan }}</td>
                                            <td>{{ $data->ket_pekerjaan }}</td>
                                            <td><a><img style="height: 100px;width: 100px;"
                                                        src="{{ url('uploads\feeds/' . $data->foto) }}">
                                                </a>
                                            </td>
                                            <td>
                                                <a href=" {{ url('/detaillokasi/' . $data->id) }}">
                                                    {{ $data->lat }},
                                                    {{ $data->lng }}
                                                </a>
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
@endsection
