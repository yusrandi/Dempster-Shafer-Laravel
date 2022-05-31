<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($userId)
    {
        $user = User::findOrFail($userId);

        return response()->json([
            'responsecode' => '1',
            'responsemsg' => 'Success',
            'data' => $user,
        ], 201);
    }
    public function login(Request $request)
    {

        // return $request;
        $hasher = app()->make('hash');
        $password = $request->password;
        $phone = $request->phone;

        $login = User::where('phone', $phone)
            // ->where('hak_akses', '!=', 1)
            // ->orwhere('hak_akses', 3)
            ->first();

        if (!$login) {
            return response()->json([
                'responsecode' => '0',
                'responsemsg' => 'Maaf Nomor anda tidak terdaftar',

            ], 201);
        } else {
            if ($hasher->check($password, $login->password)) {
                $update = $login->update([
                    'remember_token' => $request->token,
                    // 'email_verified_at' => $request->token,
                ]);

                if ($update) {
                    return response()->json([
                        'responsecode' => '1',
                        'responsemsg' => 'Selamat datang',
                        'user' => $login
                    ], 201);
                } else {
                    return response()->json([
                        'responsecode' => '0',
                        'responsemsg' => 'Gagal Update Token',
                        'user' => $login
                    ], 201);
                }
            } else {
                return response()->json([
                    'responsecode' => '0',
                    'responsemsg' => 'Maaf password anda salah',

                ], 201);
            }
        }
    }
}
