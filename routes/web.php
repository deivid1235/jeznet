<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home.index'); })->name('home'); 
Route::get('/register', function () { return view('home.create'); })->name('register');
Route::get('/libroReclamaciones', function () { return view('home.libroReclamaciones'); })->name('libroReclamaciones');
