<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BasisPengetahuans;
use Illuminate\Http\Request;

class BasisPengetahuanController extends Controller
{
    public function index()
    {
        $data = BasisPengetahuans::with('penyakit')->orderby('penyakit_id')->get();

        return response()->json([
            'responsecode' => '1',
            'responsemsg' => 'Success',
            'data' => $data,
        ], 201);
    }
}
