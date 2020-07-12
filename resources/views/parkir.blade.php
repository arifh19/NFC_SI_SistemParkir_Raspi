@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Riwayat Parkir
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered" id="laravel_datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Kartu</th>
                                    <th>Nama Kendaraan</th>
                                    <th>No Polisi</th>
                                    <th>Nama Pemilik</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($parkirs as $parkir)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$parkir->kendaraan->nomor_kartu}}</td>
                                        <td>{{$parkir->kendaraan->nama_kendaraan}}</td>
                                        <td>{{$parkir->kendaraan->no_polisi}}</td>
                                        <td>{{$parkir->kendaraan->pemilik->nama_pemilik}}</td>
                                        <td>{{$parkir->clock_in}}</td>
                                        <td>
                                            @if($parkir->clock_out==null)
                                                -
                                            @else
                                                {{$parkir->clock_out}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($parkir->status==0)
                                                Masuk
                                            @else
                                                Keluar
                                            @endif
                                        </td>
                                        <td>{{$parkir->created_at}}</td>
                                        <td>{{$parkir->updated_at}}</td>


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
          <!-- /.modal-dialog -->

@endsection
