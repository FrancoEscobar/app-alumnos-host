<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Traer todos los usuarios
        $users = User::all();

        // Pasarlos a la vista
        return view('admin.dashboard', compact('users'));
    }
}