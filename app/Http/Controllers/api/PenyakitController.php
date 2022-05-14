<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
        $data = Penyakit::orderby('penyakit_nama')->get();

        return response()->json([
            'responsecode' => '1',
            'responsemsg' => 'Success',
            'data' => $data,
        ], 201);
    }
}
