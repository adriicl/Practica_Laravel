<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    public function getAll()
    {
        return response()->json(DB::table('alumno')->get(), 200);
    }

    public function crearAlumno(Request $request)
    {
        $params = $request->validate([
            'nombre' => 'required|string|min:3|max:32',
            'telefono' => 'nullable|string|max:16',
            'edad' => 'nullable|integer|min:0',
            'password' => 'required|string|max:64',
            'email' => 'required|email|unique:alumno,email|max:64',
            'sexo' => 'nullable|string|in:Masculino,Femenino',
        ]);

        DB::table('alumno')->insert($params);

        return response()->json(['message' => 'Alumno creado con éxito'], 201);
    }

    public function modificarAlumno(Request $request, $id)
    {
        $params = $request->validate([
            'nombre' => 'string|min:3|max:32',
            'telefono' => 'nullable|string|max:16',
            'edad' => 'nullable|integer|min:0',
            'password' => 'string|max:64',
            'email' => 'email|unique:alumno,email,' . $id . '|max:64',
            'sexo' => 'nullable|string|in:Masculino,Femenino',
        ]);

        DB::table('alumno')->where('id', $id)->update($params);

        return response()->json(['message' => 'Alumno actualizado con éxito'], 200);
    }

    public function eliminarAlumno($id)
    {
        DB::table('alumno')->where('id', $id)->delete();

        return response()->json(['message' => 'Alumno eliminado con éxito'], 200);
    }

    public function devolverId($id)
    {
        $alumno = DB::table('alumno')->find($id);

        if (!$alumno) {
            return response()->json(['error' => 'Alumno no encontrado'], 404);
        }

        return response()->json($alumno, 200);
    }
}
