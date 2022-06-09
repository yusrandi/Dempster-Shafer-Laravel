<?php

namespace App\Http\Controllers;

use App\Models\BasisPengetahuans;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BasisPengetahuansController extends Controller
{

    public function index()
    {
        return view('basis-pengetahuan.index', [
            'data' => BasisPengetahuans::orderby('penyakit_id')->get(),
            'penyakits' => Penyakit::orderby('penyakit_kode')->get(),
            'gejalas' => Gejala::orderby('gejala_kode')->get(),
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $data = BasisPengetahuans::where(['penyakit_id' => $request->penyakit_id, 'gejala_id' => $request->gejala_id])->get();
        if (count($data) > 0) {
            Session::flash('error', "Data Sudah Tersedia");
            return redirect()->route('basisPengetahuans.index');
        } else {

            $insert  = BasisPengetahuans::create([
                'penyakit_id' => $request->penyakit_id,
                'gejala_id' => $request->gejala_id,


            ]);

            $insert ? Session::flash('message', "Created Basis Pengetahuan Successfully") : Session::flash('error', "Created Basis Pengetahuan Failed");

            return redirect()->route('basisPengetahuans.index');
        }
    }


    public function show(BasisPengetahuans $basisPengetahuans)
    {
        //
    }


    public function edit(BasisPengetahuans $basisPengetahuans)
    {
        //
    }


    public function update(Request $request, BasisPengetahuans $basisPengetahuans)
    {
        // return $basisPengetahuans;
        // if ($request->penyakit_id == $basisPengetahuans->penyakit_id && $request->gejala_id == $basisPengetahuans->gejala_id) {
        //     $update = $basisPengetahuans->update([
        //         'bobot' => $request->bobot,
        //     ]);
        // } else {

        // }

        $data = BasisPengetahuans::where(['penyakit_id' => $request->penyakit_id, 'gejala_id' => $request->gejala_id])->get();
        if (count($data) > 0) {
            Session::flash('error', "Data Sudah Tersedia");
            return redirect()->route('basisPengetahuans.index');
        } else {

            $update  = $basisPengetahuans->update([
                'penyakit_id' => $request->penyakit_id,
                'gejala_id' => $request->gejala_id,
                // 'bobot' => $request->bobot
            ]);
        }

        $update ? Session::flash('message', "Deleted Basis Pengetahuans Successfully") :
            Session::flash('error', "Deleted Basis Pengetahuans Failed");

        return redirect()->route('basisPengetahuans.index');
    }


    public function destroy(BasisPengetahuans $basisPengetahuans)
    {
        // return $basisPengetahuans;
        $delete = $basisPengetahuans->delete();
        $delete ? Session::flash('message', "Deleted Basis Pengetahuans Successfully") :
            Session::flash('error', "Deleted Basis Pengetahuans Failed");

        return redirect()->route('basisPengetahuans.index');
    }
}
