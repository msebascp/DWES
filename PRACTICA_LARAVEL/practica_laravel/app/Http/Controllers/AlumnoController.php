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
        $datos = $request->validate([
            'nombre' => 'string',
            'telefono' => 'nullable|string',
            'edad' => 'nullable|integer',
            'password' => 'string',
            'email' => 'unique:alumnos|string',
            'sexo' => 'string'
        ]);
        DB::table('alumnos')->insert($datos);
    }
    public function delete(Request $request, $id)
    {
        DB::table('alumnos')->where('id', $id)->delete();
    }
    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'nombre' => 'string',
            'telefono' => 'nullable|string',
            'edad' => 'nullable|integer',
            'password' => 'string',
            'email' => 'unique:alumnos|string',
            'sexo' => 'string'
        ]);
        Alumno::findorfail($id)->update($datos);
    }
}
