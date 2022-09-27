<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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

        $login = User::where(['phone' => $phone, 'role_id' => 3])
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

    public function insert(Request $request)
    {
        $daftar = User::where('phone', $request->phone)
            ->first();

        if (!$daftar) {

            $user = User::create([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'tgl_lahir_anak' => $request->tgl_lahir_anak,
                'nama_anak' => $request->nama_anak,
                'password' => Hash::make($request->password),
                'role_id' => 3,
            ]);

            return response()->json([
                'responsecode' => '1',
                'responsemsg' => 'Selamat Bergabung!',
                'data' => $user

            ], 201);
        } else {
            return response()->json([
                'responsecode' => '0',
                'responsemsg' => 'Maaf Email atau Nomor anda sudah terdaftar',
                'data' => $daftar
            ], 201);
        }
    }
    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);

        if ($request->phone != $user->phone) {
            $daftar = User::where('phone', $request->phone)
                ->first();

            if ($daftar) {
                return response()->json([
                    'responsecode' => '0',
                    'responsemsg' => 'Maaf Email atau Nomor anda sudah terdaftar',
                    'status' => $daftar
                ], 201);
            }
        }

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'nama_anak' => $request->nama_anak,
            'tgl_lahir_anak' => $request->tgl_lahir_anak,
            'address' => $request->address,
        ];
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $update = $user->update($data);

        return response()->json([
            'responsecode' => '0',
            'responsemsg' => 'Berhasil Mengubah Data',
            'status' => $update
        ], 201);
    }

    public function lupapassword(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if (!$user) {
            return response()->json([
                'responsecode' => '0',
                'responsemsg' => 'Maaf Nomor anda tidak terdaftar',
            ], 201);
        } else {
            if ($request->password) {
                $data['password'] = Hash::make($request->password);
            }

            $update = $user->update($data);

            return response()->json([
                'responsecode' => '1',
                'responsemsg' => 'Berhasil Mengubah Password',
                'status' => $update
            ], 201);
        }
    }
}
