<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController; //Con esto accedemos a la clase EmpleadoController
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

 /* Route::get('/empleado', function () {
    return view('empleado.index'); // el punto me ayuda a acceder a cualquier contenido dentro de la carpeta empleado
});

Route::get('empleado/create', [EmpleadoController::class, 'create']);  //despues de clase se pone a qeu metodo quiere acceder, ej: create
*/

Route::resource('empleado', EmpleadoController::class); //Con esto ya estamos cambiando todas las solicitudes de las vistas, Hace que las rutas como las de arriba ya no sean necesarias, 
