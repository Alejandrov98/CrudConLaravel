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
    return view('auth.login');
});

 /* Route::get('/empleado', function () {
    return view('empleado.index'); // el punto me ayuda a acceder a cualquier contenido dentro de la carpeta empleado
});

Route::get('empleado/create', [EmpleadoController::class, 'create']);  //despues de clase se pone a qeu metodo quiere acceder, ej: create
*/

Route::resource('empleado', EmpleadoController::class)->middleware('auth'); //Con esto ya estamos cambiando todas las solicitudes de las vistas, Hace que las rutas como las de arriba ya no sean necesarias, con ->middleware('auth') pedimos que respete la autentificacion

Auth::routes(['register'=>false,'reset'=>false]); //Al declarar esas variables como falsas le digo que no quiero el registro ni el recordar contraseña de lo que viene de autentificacion. 

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function (){

    Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
});
