<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Método para iniciar sesión
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirige a la ruta protegida del dashboard
            return redirect()->route('admin.dashboard'); 
        }

        return back()->withErrors([
            'email' => 'Correo o contraseña incorrecta.',
        ]);
    }

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/'); // vuelve a la página de inicio
    } 
}