<?php

namespace App\Http\Controllers;

use App\Kendaraan;
use App\Parkir;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i=1;
        $parkirs = Parkir::all()->sortByDesc('created_at');
        return view('parkir')->with(compact('parkirs','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nomor_kartu' => 'required',
        ], [
            'nomor_kartu.required' => 'nomor kartu kosong',
        ]);
        $kartu_kendaraan = Kendaraan::where('nomor_kartu',$request->nomor_kartu)->first();
        if($kartu_kendaraan==null){
            return response()->json(['error' => true, 'message' => 'Kartu Anda belum terdaftar']);
        }
        $parkir = Parkir::where('kendaraan_id',$kartu_kendaraan->id)->where('status',0)->first();
        if($parkir){
            $parkir->clock_out= Carbon::now()->toDateTimeString();
            $parkir->status=1;
            $pesan = "Parkir Keluar. Terima kasih";
        }
        else{
            $parkir = new Parkir;
            $parkir->kendaraan_id=$kartu_kendaraan->id;
            $parkir->status = 0;
            $parkir->clock_in= Carbon::now()->toDateTimeString();
            $pesan = "Parkir Masuk. Terima kasih";

        }
        $parkir->save();
        $message = [
            'nomor_kartu' => $kartu_kendaraan->nomor_kartu,
        ];
        return response()->json(['error' => false, 'message' => $pesan,'data'=>$message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parkir  $parkir
     * @return \Illuminate\Http\Response
     */
    public function show(Parkir $parkir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parkir  $parkir
     * @return \Illuminate\Http\Response
     */
    public function edit(Parkir $parkir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parkir  $parkir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parkir $parkir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parkir  $parkir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parkir $parkir)
    {
        //
    }
}
