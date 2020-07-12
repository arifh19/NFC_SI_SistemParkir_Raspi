<?php

namespace App\Http\Controllers;

use App\Kendaraan;
use App\Pemilik;
use Illuminate\Http\Request;
use Session;

class KendaraanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i=1;
        $kendaraans = Kendaraan::all();
        $pemiliks = Pemilik::all();
        return view('kendaraan')->with(compact('kendaraans','pemiliks','i'));
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
            'nomor_kartu' => 'unique:kendaraans',
        ], [
            'nomor_kartu.unique' => 'nomor kartu sudah terdaftar',
        ]);
        $kendaraan = new Kendaraan;
        $kendaraan->no_polisi = $request->no_polisi;
        $kendaraan->nama_kendaraan = $request->nama_kendaraan;
        $kendaraan->pemilik_id = $request->pemilik_id;
        $kendaraan->nomor_kartu = $request->nomor_kartu;
        $kendaraan->jenis_kendaraan = $request->jenis_kendaraan;
        $kendaraan->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "icon" => "fa fa-check",
            "message" => "Kendaraan berhasil disimpan"
        ]);
        return redirect('/kendaraan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $pemilik = Kendaraan::find($id);
        if (!$pemilik->delete()) return redirect()->back();
        // Handle hapus log via ajax
        if ($request->ajax()) return response()->json(['id' => $id]);
        Session::flash("flash_notification", [
            "level" => "success",
            "icon" => "fa fa-check",
            "message" => "Kendaraan berhasil dihapus"
        ]);
        return redirect()->route('kendaraan.index');
    }
}
