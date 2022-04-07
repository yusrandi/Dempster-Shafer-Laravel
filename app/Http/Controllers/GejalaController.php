<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class GejalaController extends Controller
{
    
    public function index()
    {
        return view('gejala.index',[
            'datas' => Gejala::orderby('status')->get()
        ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {

        $data = Gejala::orderby('id','desc')->where('status', $request->status)->first();
        $insert  = Gejala::create([
            'status' => $request->status,
            'gejala_kode' => $this->getLastID($data, $request->status),
            'gejala_nama' => $request->gejala_nama
        ]);

        $insert ? Session::flash('message', "Created Gejala Successfully") : Session::flash('error', "Created Gejala Failed") ;

        return redirect()->route('gejalas.index');


    }

    
    public function show(Gejala $gejala)
    {
        //
    }

    
    public function edit(Gejala $gejala)
    {
        //
    }

    
    public function update(Request $request, Gejala $gejala)
    {
        if ($request->status != $gejala->status) {
            $data = Gejala::orderby('id','desc')->where('status', $request->status)->first();

            $update = $gejala->update([
                'status' => $request->status,
                'gejala_nama' => $request->gejala_nama,
                'gejala_kode' => $this->getLastID($data, $request->status),
            ]);
        } else {
            
            $update = $gejala->update([
                'gejala_nama' => $request->gejala_nama
            ]);
        }
        
        $update ? Session::flash('message', "Updated Gejala Successfully") : Session::flash('error', "Updated Gejala Failed") ;

        return redirect()->route('gejalas.index');
    }

    public function destroy(Gejala $gejala)
    {
        $delete = $gejala->delete();
        $delete ? Session::flash('message', "Deleted Gejala Successfully") : Session::flash('error', "Deleted Gejala Failed") ;

        return redirect()->route('gejalas.index');
    }

    public function getIncrementNumber($id, $tags)
    {
        $tag = $tags;
        return $tag . str_pad($id, 3, '0', STR_PAD_LEFT);
    }

    public function getLastID($data, $status)
    {
        // return $data;
        if ($data) {
            return $this->getIncrementNumber(substr($data->gejala_kode,2,3) + 1, $status );
        } else {
            return $this->getIncrementNumber(1, $status);
        }
        
    }
}
