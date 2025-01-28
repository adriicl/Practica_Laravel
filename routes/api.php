<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AlumnoController;
use App\Http\Middleware\ValidarId;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckAuthenticated;
use Illuminate\Session\Middleware\StartSession;

// Rutas para el controlador AlumnoController
Route::controller(AlumnoController::class)->prefix('/alumnos')->group(function () {
    Route::get('', 'getAll'); // Obtener todos los alumnos
    Route::post('', 'crearAlumno'); // Crear un nuevo alumno
    Route::put('/{id}', 'modificarAlumno')->middleware(ValidarId::class); // Modificar un alumno
    Route::delete('/{id}', 'eliminarAlumno')->middleware(ValidarId::class); // Eliminar un alumno
    Route::get('/{id}', 'devolverId')->middleware(ValidarId::class); // Obtener un alumno por ID
});

// Grupo de rutas protegidas
// Rutas protegidas
Route::middleware([StartSession::class, CheckAuthenticated::class])->group(function () {
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Rutas públicas
Route::middleware([StartSession::class])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/public', function () {
        return 'Esta es una ruta pública.';
    });
});


Route::get('author/{id}/books', [AuthorController::class, 'showBook']);

Route::get('category/{id}/books', [CategoryController::class, 'showBooks']);
