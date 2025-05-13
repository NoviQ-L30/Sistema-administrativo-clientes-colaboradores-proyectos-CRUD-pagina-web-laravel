<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Proyects_Controller;
use App\Http\Controllers\Collaborators_Controller;
use App\Http\Controllers\Clientes_Controller;
use App\Http\Controllers\Clientes_Controller2;
use App\Http\Controllers\Proyectos_Controller;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ImagenController2;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clientes_ControllerEdit;
use App\Http\Controllers\Collaborators_ControllerEdit;
use App\Http\Controllers\Proyects_ControllerEdit;
use App\Http\Controllers\Clientes_ControllerEdit2;
use App\Http\Controllers\Proyects_ControllerEdit2;
use App\Http\Controllers\Collaborators_ControllerEdit2;
use App\Http\Controllers\Pagos_Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//ruta para vista-ProyectosVista---------------------------------------------------------
Route::get('/ProyectosVista',[Proyects_Controller::class, 'index'])->name("ProyectosVista");

// usamos el post de apoyo
Route::post('/ProyectosVista', [Proyects_Controller::class, 'store']);

//ruta para vista-Collaborators ---------------------------------------------------------
Route::get('/CollaboratorsVista', [Collaborators_Controller::class,'index'])->name("CollaboratorsVista");

// usamos el post de apoyo
Route::post('/CollaboratorsVista', [Collaborators_Controller::class, 'store']);


Route::post('/ClientesN', [Clientes_Controller2::class, 'store']);

Route::get('/ClientesN', [Clientes_Controller2::class,'index'])->name("ClientesN");

Route::get('/Dash', [Clientes_Controller::class,'index'])->name("Dash");

Route::get('/Dash2', [Proyectos_Controller::class,'index'])->name("Dash2");

Route::post('/archivos', [ArchivoController::class,'store'])->name('archivos.store');

Route::post('/imagenes', [ImagenController::class,'store'])->name('imagenes.store');

Route::post('/imagenes2', [ImagenController2::class,'store'])->name('imagenes2.store');


Route::put('/edit', [Proyects_Controller::class, 'update'])->name('edit.update');

Route::get("/ClientesB", [Clientes_ControllerEdit::class, "index"])->name(
    "ClientesB"
);

Route::get("/AgregarC", [Pagos_Controller::class, "index"])->name(
    "AgregarC"
);



//ruta para vista-ColaboradoresEdicion
Route::get("/CollaboratorsB", [Collaborators_ControllerEdit::class, "index"])->name(
    "CollaboratorsB"
);

//ruta para vista-ProyectosEdicion
Route::get("/ProyectosB", [Proyects_ControllerEdit::class, "index"])->name(
    "ProyectosB"
);

Route::get('/clientes/{cliente}/edit', [Clientes_ControllerEdit2::class, 'edit'])->name('clientes.edit');

Route::PUT('/clientes/{cliente}', [Clientes_ControllerEdit2::class, 'update'])->name('clientes.update');

Route::delete("/clientes/{cliente}", [
    Clientes_ControllerEdit::class,
    "destroy",
])->name("clientes.destroy");

//----------------------------------------------
Route::delete("/proyects/{proyect}", [
    Proyects_ControllerEdit::class,
    "destroy",
])->name("proyects.destroy");

Route::get('/proyects/{proyect}/edit', [Proyects_ControllerEdit2::class, 'edit'])->name('proyects.edit');

Route::PUT('/proyects/{proyect}', [Proyects_ControllerEdit2::class, 'update'])->name('proyects.update');

//---------------------------------------
Route::delete("/collaborators/{collaborator}", [
    Collaborators_ControllerEdit::class,
    "destroy",
])->name("collaborators.destroy");

Route::get('/collaborators/{collaborator}/edit', [Collaborators_ControllerEdit2::class, 'edit'])->name('collaborators.edit');

Route::PUT('/collaborators/{collaborator}', [Collaborators_ControllerEdit2::class, 'update'])->name('collaborators.update');







Route::delete('/Datos1', [Proyects_Controller::class, 'destroy'])->name('Datos1.destroy');
Route::delete('/Datos2', [Collaborators_Controller::class, 'destroy'])->name('Datos2.destroy');
Route::delete('/Datos3', [Clientes_Controller2::class, 'destroy'])->name('Datos3.destroy');


Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
