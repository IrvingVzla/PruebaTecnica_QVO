<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Mail\Notification;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rutas para el funcionamiento de mostrar y actualizar tareas
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');
    Route::put('/update/{id}', [TaskController::class, 'update'])->name('dashboard.update');
});

///Rutas para el funcionamiento de crear usuario
Route::middleware('auth')->group(function () {
    Route::get('create', [TaskController::class, 'create'])->name('crear');
    Route::post('/store', [TaskController::class, 'store'])->name('crear.store');
});

///Ruta que se encarga del envio del correo (Por el momento no hace nada *Futuras versiones*)
Route::middleware('auth')->group(function () {
    Route::post('/enviar-correo', [EmailController::class, 'enviarCorreo'])->name('enviar-correo');
});

require __DIR__.'/auth.php';
