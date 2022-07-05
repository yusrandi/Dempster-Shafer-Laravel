<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index($id)
    {
        $data = Laporan::with(['penyakit', 'user'])
            ->where('user_id', $id)
            ->latest()->get();

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
            'penyakits' => $request->penyakits,
            'user_id' => $request->user_id,
            'cf' => $request->cf
        ]);

        return response()->json([
            'responsecode' => '1',
            'responsemsg' => 'Terima kasih telah melakukan diagnosa!'
        ], 201);
    }
}
