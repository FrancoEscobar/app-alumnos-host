<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    // Mostrar formulario de registro
    public function create()
    {
        return view('auth.register');
    }

    // Procesar el registro
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::defaults()],
            'phone' => 'nullable|string|max:20',
            'network_link' => 'nullable|url|max:255',
            'profile_photo' => 'required|image|max:2048',
        ]);

        // Guardar la foto
        $path = $request->file('profile_photo')->store('profile_photos', 'public');

        // Crear usuario
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'] ?? null,
            'network_link' => $validated['network_link'] ?? null,
            'photo_path' => $path,
            'is_admin' => false,
        ]);

        // Login automático
        auth()->login($user);

        if ($user->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    }
}