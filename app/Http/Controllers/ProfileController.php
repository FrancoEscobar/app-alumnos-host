<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('user.dashboard', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'professional_url' => 'nullable|url|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($user->photo_path) {
                Storage::delete($user->photo_path); // eliminar foto anterior
            }
            $validatedData['photo_path'] = $request->file('photo')->store('photos', 'public');
        }

        $user->update($validatedData);

        return redirect()->route('user.dashboard')->with('success', 'Perfil actualizado correctamente.');
    }
}