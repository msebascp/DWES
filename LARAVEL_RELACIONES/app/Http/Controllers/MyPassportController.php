<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MyPassportController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required | email:rfc | unique:owners',
            'password' => 'required',
        ]);
        $data['password'] = Hash::make($data['password']);
        $user = new Owner($data);
        $user->save();
        $token = $user->createToken('myToken')->accessToken;
        return response()->json([
            "success" => true,
            "message" => "Usuario registrado",
            "data" => [
                $token
            ]
        ]);
    }

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
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = Owner::where('email', '=', $request->email)->orWhere('name', '=', $request->email)->first();
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
        $token = $user->createToken("myToken")->accessToken;
        return response()->json([
            "success" => true,
            "message" => "El usuario se ha logueado",
            "data" => [
                $token
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
        $user = Auth::user();
        $user->token()->revoke();
        return response()->json([
            "success" => true,
            "message" => "Cierre de sesión correcto"
        ]);
    }

    public function endpoint(Request $request)
    {
        $user = Auth::user();
        $user->tokens()->each(function ($token) {
            $token->delete();
        });
        return response()->json([
            "success" => true,
            "message" => "Tokens eliminados correctamente"
        ]);
    }
}
