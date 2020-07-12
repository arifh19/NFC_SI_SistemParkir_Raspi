<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemilik;
use App\Parkir;
use App\Kendaraan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pemiliks = Pemilik::all();
        $parkirs = Parkir::all();
        $kendaraans = Kendaraan::all();
        return view('home')->with(compact('pemiliks','parkirs', 'kendaraans'));
    }
}
