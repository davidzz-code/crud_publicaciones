<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'SuperAdmin',
            'email' => 'super@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'SUPER'
        ]);
        
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'ADMIN'
        ]);

        User::create([
            'name' => 'Propietario',
            'email' => 'propietario@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'OWNER'
        ]);

        User::create([
            'name' => 'Invitado',
            'email' => 'invitado@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'GUEST'
        ]);
    }
}
