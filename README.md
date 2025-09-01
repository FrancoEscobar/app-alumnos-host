# app-alumnos
# Guía rápida - Aplicación Laravel Usuarios y Perfiles

## Requisitos
- PHP >= 8.1
- Composer
- Laravel 10.x
- MySQL / MariaDB
- Node.js y NPM (opcional, si usás Vite o Mix)

## Instalación rápida
1. Clonar repositorio y entrar al proyecto:
```bash
git clone <URL_DEL_REPOSITORIO>
cd nombre-del-proyecto

2. Instalar dependencias PHP:
composer install

3. Copiar archivo de entorno y configurar base de datos:
cp .env.example .env

4. Editar .env con los datos de tu base de datos:
DB_DATABASE=nombre_base
DB_USERNAME=usuario
DB_PASSWORD=contraseña

4. Generar clave de apliacion y ejecutar migraciones:
php artisan key:generate
php artisan migrate

5. Instalar Node.js y compilar assets:
npm install
npm run dev

## Uso basico:
registro de usuarios: /register
Login: /login
    Usuarios normales → user.dashboard
    Administradores → admin.dashboard
Perfil de usuario: /profile/edit
    Actualizar nombre, email, teléfono, URL profesional y foto de perfil
    Cada usuario solo puede editar su propio perfil
Cerrar sesión: botón en dashboard → redirige a login
