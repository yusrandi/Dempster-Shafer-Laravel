<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $data = Gejala::with('basisPengetahuans')->orderby('gejala_nama')->get();

        return response()->json([
            'responsecode' => '1',
            'responsemsg' => 'Success',
            'data' => $data,
        ], 201);
    }
}
