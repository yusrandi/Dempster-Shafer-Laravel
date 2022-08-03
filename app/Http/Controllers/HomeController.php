<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Laporan;
use App\Models\Penyakit;
use App\Models\User;
use Illuminate\Http\Request;

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
        $pasiens = User::where('role_id', 3)->get();
        $penyakits = Penyakit::all();
        $gejalas = Gejala::all();
        $histories = Laporan::all();

        return view('home', [
            'pasiens' => count($pasiens),
            'penyakits' => count($penyakits),
            'gejalas' => count($gejalas),
            'histories' => count($histories),
        ]);
    }
}
