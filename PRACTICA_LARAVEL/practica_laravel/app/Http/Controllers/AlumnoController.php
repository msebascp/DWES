<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    public function getAll(Request $request)
    {
        return Alumno::paginate();
    }
    public function getById(Request $request, $id)
    {
        return Alumno::findorfail($id);
    }
    public function create(Request $request)
    {
        $name = $request->input('name');
        $telefono = $request->input('telefono');
        $edad = $request->input('edad');
        $password = $request->input('password');
        $email = $request->input('email');
        $sexo = $request->input('sexo');
        $datos = $request->validate([
            'name' => 'string',
            'telefono' => 'string',
            'edad' => 'integer',
            'password' => 'string',
            'email' => 'unique:alumnos|string',
            'sexo' => 'string'
        ]);
        DB::table('alumnos')->insert($datos);
    }
    public function delete(Request $request, $id)
    {
        DB::table('alumnos')->where('id', $id)->delete();
        //return response()->json('Elimino todas las mascotas');
    }
}
