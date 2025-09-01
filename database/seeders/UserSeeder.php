<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Usuario1',
            'email' => 'usuario1@gmail.com',
            'password' => bcrypt('soyuser'),
            'is_admin' => false,
            'photo_path' => 'default.png',
        ]);
    }
}
