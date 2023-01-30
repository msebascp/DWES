<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            return response()->json([
                "success" => false,
                "message" => "El usuario ya está logueado",
                "data" => [
                    Auth::user()
                ]
            ]);
        }
        $request->validate([
            'email' => 'required | email:rfc',
            'password' => 'required'
        ]);
        $user = Owner::where('email', '=', $request->email)->first();
        if (empty($user)) {
            return response()->json([
                "success " => false,
                "message" => "El usuario no existe"
            ], 401);
        } elseif (!Hash::check($request->password, $user->password)) {
            return response()->json([
                "success" => false,
                "message" => "Contraseña incorrecta"
            ], 401);
        }
        $user->api_token = $user->createToken("token")->plainTextToken;
        $user->save();
        return response()->json([
            "success" => true,
            "message" => "El usuario se ha logueado",
            "data" => [
                "token" => $user->api_token
            ]
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone',
            'email' => 'required | email:rfc | unique:owners',
            'password' => 'required',
            'age',
            'rememberToken'
        ]);
        $data['password'] = Hash::make($data['password']);
        $user = new Owner($data);
        $user->save();
        return response()->json([
            "success" => true,
            "message" => "Usuario registrado",
            "data" => [
                $user
            ]
        ]);
    }

    public function me(Request $request)
    {
        return response()->json([
            "success" => true,
            "message" => "Datos de usuario: ",
            "data" => [
                Auth::user()
            ]
        ]);
    }

    public function logout(Request $request)
    {
        Auth::user()->api_token = null;
        Auth::user()->save();
        return response()->json([
            "success" => true,
            "message" => "Cierre de sesión correcto"
        ]);
    }
}
