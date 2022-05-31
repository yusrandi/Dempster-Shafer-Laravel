<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
        return view(
            'user.index',
            [
                'data' => User::orderby('role_id')->get()
            ]
        );
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $insert = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);
        $insert ? Session::flash('message', "Created User Successfully") :
            Session::flash('error', "Created User Failed");

        return redirect()->route('user.index');
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        //
    }


    public function update(Request $request, User $user)
    {
        $data = [
            'role_id' => $request->role_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        if ($request->password) {

            $data['password'] = Hash::make($request->password);
        }
        $update = $user->update($data);
        $update ? Session::flash('message', "Updated User Successfully") :
            Session::flash('error', "Updated User Failed");

        return redirect()->route('user.index');
    }


    public function destroy(User $user)
    {
        $delete = $user->delete();
        $delete ? Session::flash('message', "Deleted User Successfully") :
            Session::flash('error', "Deleted User Failed");

        return redirect()->route('user.index');
    }
}
