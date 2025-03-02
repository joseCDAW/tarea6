<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Método para mostrar la vista de login (web)
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Método para procesar el login (web y API)
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Credenciales incorrectas'], 401);
            }
            return back()->withErrors(['error' => 'Credenciales incorrectas']);
        }

        $user = Auth::user();

        // Si es una petición API, devolver un token
        if ($request->expectsJson()) {
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['token' => $token], 200);
        }

        // Si es una petición web, redirigir al dashboard
        return redirect()->route('welcome')->with('success', 'Inicio de sesión exitoso');
    }

    // Método para mostrar la vista de registro (web)
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Método para procesar el registro (web y API)
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Si es una petición API, devolver un token
            if ($request->expectsJson()) {
                $token = $user->createToken('authToken')->plainTextToken;
                return response()->json([
                    'message' => 'Usuario registrado correctamente',
                    'token' => $token
                ], 201);
            }

            // Si es una petición web, redirigir al login
            return redirect()->route('login')->with('success', 'Usuario registrado correctamente');
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Error al registrar: ' . $e->getMessage()], 500);
            }
            return back()->withErrors(['error' => 'Error al registrar: ' . $e->getMessage()]);
        }
    }

    // Método para cerrar sesión (web y API)
    public function logout(Request $request)
    {
        // Si es una petición API, eliminar el token
        if ($request->expectsJson()) {
            $request->user()->currentAccessToken()->delete();
            return response()->json(['message' => 'Cierre de sesión exitoso']);
        }

        // Si es una petición web, cerrar sesión
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Cierre de sesión exitoso');
    }
}
