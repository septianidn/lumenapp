<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use stdClass;

class AuthController extends Controller
{
    public function register(Request $request){

        $this->validate($request, [
            'username' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

         User::create([
            'username' => htmlspecialchars(trim($request->username)),
            'nama' => htmlspecialchars(trim($request->nama)),
            'email' => htmlspecialchars(trim($request->email)),
            'no_hp' => htmlspecialchars(trim($request->no_hp)),
            'password' => htmlspecialchars($request->password)
        ]);

        return response()->json(['message' => 'Pendaftaran berhasil']);
    }
    
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        $username = $request->username;
        $password = $request->password;

        $user = User::where('username', $username)->first();
        if (!$user) {
            return response()->json(['message' => 'Login failed'], 401);
        }

      

        $generateToken = bin2hex(random_bytes(40));
        $user->update([
            'token' => $generateToken
        ]);

        $data = new stdClass;
        $data->data = $user;

        return response()->json($data);
    }

    public function logout(Request $request){
        $user = \Auth::user();
        $user->token = null;
        $user->save();

        return response()->json(['message' => 'Pengguna telah logout']);
    }
}
