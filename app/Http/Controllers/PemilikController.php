<?php

namespace App\Http\Controllers;

use App\Pemilik;
use Illuminate\Http\Request;
use Session;

class PemilikController extends Controller
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
        $pemiliks = Pemilik::all();
        return view('pemilik')->with(compact('pemiliks','i'));
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
        $inv = new Pemilik;
        $inv->nama_pemilik = $request->nama_pemilik;
        $inv->alamat = $request->alamat;
        $inv->telp = $request->telp;
        $inv->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "icon" => "fa fa-check",
            "message" => "Pemilik berhasil disimpan"
        ]);
        return redirect('/pemilik');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pemilik  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function show(Pemilik $pemilik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pemilik  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemilik $pemilik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pemilik  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemilik $pemilik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pemilik  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $pemilik = Pemilik::find($id);
        if (!$pemilik->delete()) return redirect()->back();
        // Handle hapus log via ajax
        if ($request->ajax()) return response()->json(['id' => $id]);
        Session::flash("flash_notification", [
            "level" => "success",
            "icon" => "fa fa-check",
            "message" => "Pemilik berhasil dihapus"
        ]);
        return redirect()->route('pemilik.index');
    }
}
