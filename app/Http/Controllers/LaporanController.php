<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LaporanController extends Controller
{

    public function index()
    {

        return view('laporan.index', [
            'data' => Laporan::latest()->get()
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Laporan $laporan)
    {
        //
    }


    public function edit(Laporan $laporan)
    {
        //
    }


    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    public function destroy(Laporan $laporan)
    {
        $delete = $laporan->delete();
        $delete ? Session::flash('message', "Deleted Laporan Successfully") :
            Session::flash('error', "Deleted Laporan Failed");

        return redirect()->route('laporan.index');
    }
}
