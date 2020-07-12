@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Kendaraan
                            <button class="btn btn-primary col-md-offset-10" data-toggle="modal" data-target="#modal-default">Tambah</button>
                    </div>
                    <div class="panel-body">

                        <table class="table table-bordered" id="laravel_datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pemilik</th>
                                    <th>Nama Kendaraan</th>
                                    <th>No Polisi</th>
                                    <th>Nomor Kartu</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($kendaraans as $kendaraan)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$kendaraan->pemilik->nama_pemilik}}</td>
                                        <td>{{$kendaraan->nama_kendaraan}}</td>
                                        <td>{{$kendaraan->no_polisi}}</td>
                                        <td>{{$kendaraan->nomor_kartu}}</td>
                                        <td>{{$kendaraan->jenis_kendaraan}}</td>
                                        <td>{{$kendaraan->created_at}}</td>
                                        <td>{{$kendaraan->updated_at}}</td>

                                    <td>
                                        {{-- <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-edit"></i></button> --}}
                                        {{ Form::open(['url' => route('kendaraan.destroy', $kendaraan->id), 'method' => 'delete', 'class' => 'btn btn-outline-danger']) }}
                                            <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                        {{ Form::close() }}
                                    </td>
                                    </tr>
                                    <div hidden>{{$i++}}<div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Kendaraan</h4>
                </div>
            <form class="form-horizontal" method="POST" action="{{route('kendaraan.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('daerah') ? ' has-error' : '' }}">
                        <label for="nama_kendaraan" class="col-md-4 control-label">Nama Kendaraan</label>
                        <div class="col-md-6">
                            <input class="form-control" name="nama_kendaraan" required>
                        </div>
                        <label for="no_polisi" class="col-md-4 control-label">Nomor Polisi</label>
                        <div class="col-md-6">
                            <input class="form-control" name="no_polisi" required>
                        </div>
                        <label for="pemilik_id" class="col-md-4 control-label">Nama Pemilik</label>
                        <div class="col-md-6">
                            <select name="pemilik_id" class="form-control select2" style="width: 100%" required>
                                <option value="" disabled selected>Tentukan Nama Pemilik</option>
                                @foreach($pemiliks as $pemilik)
                                    <option value="{{$pemilik->id}}">{{$pemilik->nama_pemilik}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="nomor_kartu" class="col-md-4 control-label">Nomor Kartu</label>
                        <div class="col-md-6">
                            <input class="form-control" name="nomor_kartu" required>
                        </div>
                        <label for="jenis_kendaraan" class="col-md-4 control-label">Jenis Kendaraan</label>
                        <div class="col-md-6">
                            <input class="form-control" name="jenis_kendaraan" required>
                        </div>
                    </div>

            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
            <!-- /.modal-content -->
    </div>
          <!-- /.modal-dialog -->

@endsection
@section('scripts')
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
  </script>
@endsection
