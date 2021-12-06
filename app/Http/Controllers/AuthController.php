<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use stdClass;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        $email = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $email)->first();
        if (!$user) {
            return response()->json(['message' => 'Login failed'], 401);
        }

      

        $generateToken = bin2hex(random_bytes(40));
        $user->update([
            'remember_token' => $generateToken
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
