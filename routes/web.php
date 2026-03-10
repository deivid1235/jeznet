<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReclamoController;

Route::get('/', function () { return view('home.index'); })->name('home'); 
Route::get('/register', function () { return view('home.create'); })->name('register');

Route::get('/libroReclamaciones', [ReclamoController::class, 'index'])->name('libroReclamaciones');
Route::post('/libroReclamaciones', [ReclamoController::class, 'store'])->name('libroReclamaciones.store');

Route::view('/politica-de-privacidad', 'home.politicaPrivacidad')->name('politicaPrivacidad');
