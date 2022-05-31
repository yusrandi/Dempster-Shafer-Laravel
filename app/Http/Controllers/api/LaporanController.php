<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $data = Laporan::with(['penyakit', 'user'])->latest()->get();

        return response()->json([
            'responsecode' => '1',
            'responsemsg' => 'Success!',
            'data' => $data,
        ], 201);
    }
    public function store(Request $request)
    {
        $ldate = date('Y-m-d');
        Laporan::create([
            'tanggal' => $ldate,
            'penyakit_id' => $request->penyakit_id,
            'user_id' => $request->user_id,
            'cf' => $request->cf
        ]);

        return response()->json([
            'responsecode' => '1',
            'responsemsg' => 'Terima kasih telah melakukan diagnosa!'
        ], 201);
    }
}
