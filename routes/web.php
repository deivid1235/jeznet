<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReclamoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () { return view('home.index'); })->name('home');
Route::get('/register', function () { return view('home.create'); })->name('register');
Route::post('/register', [ClienteController::class, 'store'])->name('home.create.store');
Route::get('/libroReclamaciones', [ReclamoController::class, 'index'])->name('libroReclamaciones');
Route::post('/libroReclamaciones', [ReclamoController::class, 'store'])->name('libroReclamaciones.store');
Route::view('/politica-de-privacidad', 'home.politicaPrivacidad')->name('politicaPrivacidad');
Route::get('/login', function () { return redirect('/'); })->name('login.get'); 
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//Rutas protegidas solo para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});