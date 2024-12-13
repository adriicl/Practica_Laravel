<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AlumnoController;
use App\Http\Middleware\ValidarId;
use Illuminate\Support\Facades\Route;

// Rutas para el controlador AlumnoController
Route::controller(AlumnoController::class) ->prefix('/alumnos') ->group(function () {
        Route::get('', 'getAll'); // Obtener todos los alumnos
        Route::post('', 'crearAlumno'); // Crear un nuevo alumno
        Route::put('/{id}', 'modificarAlumno')->middleware(ValidarId::class); // Modificar un alumno
        Route::delete('/{id}', 'eliminarAlumno')->middleware(ValidarId::class); // Eliminar un alumno
        Route::get('/{id}', 'devolverId')->middleware(ValidarId::class); // Obtener un alumno por ID
    });
