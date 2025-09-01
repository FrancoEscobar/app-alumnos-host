@extends('layouts.app')

<!-- Botón de Cerrar Sesión -->
<div class="fixed top-4 right-4 z-50">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700">
            Cerrar Sesión
        </button>
    </form>
</div>

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Usuarios Registrados</h1>

    <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-blue-600 text-white">
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border"></th> <!-- columna de foto sin encabezado -->
                <th class="px-4 py-2 border">Nombre</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Teléfono</th>
                <th class="px-4 py-2 border">URL Profesional</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="px-4 py-2 border">{{ $user->id }}</td>
                <td class="px-4 py-2 border">
                    @if($user->photo_path)
                        <img src="{{ asset('storage/' . $user->photo_path) }}" 
                             alt="Foto de {{ $user->name }}" 
                             class="w-12 h-12 rounded-full">
                    @endif
                </td>
                <td class="px-4 py-2 border">{{ $user->name }}</td>
                <td class="px-4 py-2 border">{{ $user->email }}</td>
                <td class="px-4 py-2 border">
                    @if($user->phone)
                        <a href="https://wa.me/{{ config('app.whatsapp.prefix') }}{{ $user->phone }}" 
                           class="text-blue-600 hover:underline" target="_blank">
                           {{ config('app.whatsapp.prefix') }}{{ $user->phone }}
                        </a>
                    @endif
                </td>
                <td class="px-4 py-2 border">
                    @if($user->professional_url)
                        <a href="{{ $user->professional_url }}" target="_blank" class="text-blue-600 hover:underline">
                            {{ $user->professional_url }}
                        </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
