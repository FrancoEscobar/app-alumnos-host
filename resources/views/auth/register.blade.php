<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded shadow-md w-full max-w-md">
        @csrf
        <h2 class="text-2xl font-bold mb-6 text-center">Registro</h2>

        <!-- Nombre -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nombre *</label>
            <input type="text" name="name" id="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email *</label>
            <input type="email" name="email" id="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Contraseña -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Contraseña *</label>
            <input type="password" name="password" id="password" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Confirmar contraseña *</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('password_confirmation')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- Teléfono -->
        <div class="mb-4">
            <label for="phone" class="block text-gray-700">Teléfono</label>
            <div class="flex mt-1">
                <span class="px-3 py-2 bg-gray-200 border rounded-l-md">{{ config('app.whatsapp.prefix') }}</span>
                <input type="text" name="phone" id="phone"
                    class="w-full border-gray-300 rounded-r-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('phone') }}">
            </div>
            @error('phone')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Enlace a red profesional -->
        <div class="mb-4">
            <label for="network_link" class="block text-gray-700">Enlace a red profesional</label>
            <input type="url" name="network_link" id="network_link" placeholder="LinkedIn, GitHub, etc." class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('network_link')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Foto de perfil -->
        <div class="mb-6">
            <label for="profile_photo" class="block text-gray-700">Foto de perfil *</label>
            <input type="file" name="profile_photo" id="profile_photo" required accept="image/*" class="mt-1 block w-full text-gray-700">
            @error('profile_photo')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Registrarse</button>
    </form>
</body>
</html>
