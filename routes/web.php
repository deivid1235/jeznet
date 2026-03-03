<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home.index'); })->name('home'); 
Route::get('/register', function () { return view('home.create'); })->name('register');