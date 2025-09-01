@extends('layouts.app')

@section('content')

<!-- Botón de Cerrar Sesión -->
<div class="fixed top-4 right-4 z-50">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700">
            Cerrar Sesión
        </button>
    </form>
</div>

<div class="container mx-auto px-4 py-6 relative">
    <h1 class="text-2xl font-bold mb-4 text-center">Alumno</h1>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg p-6 mt-8">
        <h2 class="text-xl font-semibold mb-4">Mi Perfil</h2>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Foto -->
            <div class="mb-4 flex items-center">
                @if(Auth::user()->photo_path)
                    <img src="{{ asset('storage/' . Auth::user()->photo_path) }}" alt="Foto de {{ Auth::user()->name }}" class="w-20 h-20 rounded-full mr-4">
                @endif
                <div>
                    <label class="block text-gray-700">Actualizar Foto</label>
                    <input type="file" name="photo" class="mt-1">
                    @error('photo')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
            </div>

            <!-- Nombre -->
            <div class="mb-4">
                <label class="block text-gray-700">Nombre</label>
                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <!-- Teléfono -->
            <div class="mb-4">
                <label class="block text-gray-700">Teléfono</label>
                <div class="flex">
                    <span class="px-3 py-2 bg-gray-200 border rounded-l-md">{{ config('app.whatsapp.prefix') }}</span>
                    <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" class="w-full border-gray-300 rounded-r-md shadow-sm">
                </div>
                @error('phone')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <!-- URL Profesional -->
            <div class="mb-4">
                <label class="block text-gray-700">URL Profesional</label>
                <input type="url" name="professional_url" value="{{ old('professional_url', Auth::user()->professional_url) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                @error('professional_url')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Actualizar Perfil</button>
        </form>
    </div>
</div>
@endsection