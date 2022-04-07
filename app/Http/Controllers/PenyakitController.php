<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PenyakitController extends Controller
{
   public $penyakit;
    public function index()
    {
        // return $this->getIncrementNumber(40);
        // return $this->getLastID();
        
        return view('penyakit.index',[
            'penyakit_kode' => $this->getLastID(),
            'status' => 'create',
            'penyakit' => new Penyakit(),
            'data' => Penyakit::orderby('id')->get()
        ]);
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $data = $request->validate([
            'penyakit_kode' => 'required|unique:penyakits',
            'penyakit_nama' => 'required|max:255',
        ]);
        $insert = Penyakit::create($data);
        $insert ? Session::flash('message', "Created Penyakit Successfully") : Session::flash('error', "Created Penyakit Failed") ;

        return redirect()->route('penyakits.index');
    }

    public function show(Penyakit $penyakit)
    {
        //
    }

  
    public function edit(Penyakit $penyakit)
    {
        $this->penyakit = $penyakit;
        return view('penyakit.index',[
            'status' => 'update',
            'penyakit' => $penyakit,
            'data' => Penyakit::orderby('id')->get()
        ]);
    }

  
    public function update(Request $request, Penyakit $penyakit)
    {
        $data = $request->validate([
            
            'penyakit_nama' => 'required|max:255',
        ]);
        $update = $penyakit->update($data);
        $update ? Session::flash('message', "Updated Penyakit Successfully") : 
        Session::flash('error', "Updated Penyakit Failed") ;

        return redirect()->route('penyakits.index');


    }

 
    public function destroy(Penyakit $penyakit)
    {
        
        $delete = $penyakit->delete();
        $delete ? Session::flash('message', "Deleted Penyakit Successfully") : 
        Session::flash('error', "Deleted Penyakit Failed") ;

        return redirect()->route('penyakits.index');

    }

    public function getIncrementNumber($id)
    {
        $tag = "P";
        return $tag . str_pad($id, 3, '0', STR_PAD_LEFT);
    }

    public function getLastID()
    {
        $data = Penyakit::orderby('id', 'desc')->first();
        // return $data;
        if ($data) {
            
            return $this->getIncrementNumber(substr($data->penyakit_kode,2,3) + 1);
        } else {
            return $this->getIncrementNumber(1);
        }
        
    }
}
