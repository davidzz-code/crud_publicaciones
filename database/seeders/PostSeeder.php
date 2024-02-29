<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            "title" => "Ejemplo de SuperAdmin",
            "extract" => "Intenta borrarme si eres Invitado",
            "content" => "Bienvenido/a a mi ejemplo",
            "commentable" => "t",
            "access" => "PUBLIC",
            "user_id" => 1

        ]);

        Post::create([
            "title" => "Ejemplo de Administrador",
            "extract" => "Si eres SuperAdmin o Administrador de este post me puedes editar",
            "content" => "Bienvenido a mi post",
            "commentable" => "t",
            "expirable" => "t",
            "access" => "PUBLIC",
            "user_id" => 2
        ]);


    }
}
