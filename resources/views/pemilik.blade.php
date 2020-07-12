@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Pemilik
                            <button class="btn btn-primary col-md-offset-10" data-toggle="modal" data-target="#modal-default">Tambah</button>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered" id="laravel_datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pemilik</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($pemiliks as $pemilik)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$pemilik->nama_pemilik}}</td>
                                        <td>{{$pemilik->alamat}}</td>
                                        <td>{{$pemilik->telp}}</td>
                                        <td>{{$pemilik->created_at}}</td>
                                        <td>{{$pemilik->updated_at}}</td>

                                    <td>
                                        {{-- <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-edit"></i></button> --}}
                                        {{ Form::open(['url' => route('pemilik.destroy', $pemilik->id), 'method' => 'delete', 'class' => 'btn btn-outline-danger']) }}
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
                    <h4 class="modal-title">Tambah Pemilik</h4>
                </div>
            <form class="form-horizontal" method="POST" action="{{route('pemilik.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('daerah') ? ' has-error' : '' }}">
                        <label for="nama_pemilik" class="col-md-4 control-label">Nama Pemilik</label>
                        <div class="col-md-6">
                            <input class="form-control" name="nama_pemilik" required>
                        </div>
                        <label for="alamat" class="col-md-4 control-label">Alamat</label>
                        <div class="col-md-6">
                            <input class="form-control" name="alamat" required>
                        </div>
                        <label for="telp" class="col-md-4 control-label">Telpon</label>
                        <div class="col-md-6">
                            <input class="form-control" name="telp" required>
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
