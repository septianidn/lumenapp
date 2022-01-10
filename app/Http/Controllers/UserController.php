<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6'
        ]);
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        $user = User::create([
            'email' => $email,
            'password' => $password
        ]);

        return response()->json(['message' => 'Pendaftaran pengguna berhasil dilaksanakan']);
    }

    public function ubahProfil(Request $request){

        User::whereToken(auth()->guard('api')->user()->token)->update([
            'nama' => htmlspecialchars(trim($request->nama)),
            'email' => htmlspecialchars(trim($request->email)),
            'username' => htmlspecialchars(trim($request->username)),
            'no_hp' => htmlspecialchars(trim($request->no_hp))
        ]);

        return response()->json(['message' => 'Profil berhasil diubah']);
    }
}
