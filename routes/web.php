<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReclamoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CronogramaController;
use App\Models\Area;
use Symfony\Component\Routing\Router;

//RUTAS PÚBLICAS
Route::get('/', function () { 
    $areas = Area::where('estado', 'Activo')->latest()->get(); 
    return view('home.index', compact('areas')); 
})->name('home');
Route::get('/register', function () { return view('home.create'); })->name('register');
Route::post('/register', [ClienteController::class, 'store'])->name('home.create.store');
Route::get('/libroReclamaciones', [ReclamoController::class, 'index'])->name('libroReclamaciones');
Route::post('/libroReclamaciones', [ReclamoController::class, 'store'])->name('libroReclamaciones.store');
Route::view('/politica-de-privacidad', 'home.politicaPrivacidad')->name('politicaPrivacidad');
Route::get('/soluciones/{area}', [AreaController::class, 'detallePublico'])->name('soluciones.ficha');
Route::post('/soluciones/solicitar', [AreaController::class, 'solicitarServicio'])->name('soluciones.solicitar');
Route::get('/tienda', [AreaController::class, 'tienda'])->name('tienda');

//Rutas de Autenticación
Route::get('/login', function () { return redirect('/'); })->name('login.get'); 
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//RUTAS PROTEGIDAS (usuarios autenticados)
Route::middleware('auth')->group(function () {
    
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    //RUTAS DE ÁREAS
    Route::get('/admin/areas/trashed', [AreaController::class, 'trashed'])->name('areas.trashed');
    Route::patch('/admin/areas/{area}/toggle-status', [AreaController::class, 'toggleStatus'])->name('areas.toggle-status');
    Route::patch('/admin/areas/{id}/restore', [AreaController::class, 'restore'])->name('areas.restore');
    Route::resource('/admin/areas', AreaController::class)->names('areas');

    //RUTAS DE PROYECTOS
    Route::get('/admin/proyectos/historial', [ProyectoController::class, 'historial'])->name('proyectos.historial');
    Route::post('/admin/proyectos/{id}/finalizar', [ProyectoController::class, 'finalizar'])->name('proyectos.finalizar');
    Route::post('/admin/proyectos/{id}/cancelar', [ProyectoController::class, 'cancelar'])->name('proyectos.cancelar');
    Route::resource('/admin/proyectos', ProyectoController::class)->names('proyectos');
    Route::post('/admin/proyectos/{id}/reactivar', [ProyectoController::class, 'reactivar'])->name('proyectos.reactivar');

    //RUTAS DE CRONOGRAMA
    Route::get('/admin/cronograma', [CronogramaController::class, 'index'])->name('cronograma.index');
    

});