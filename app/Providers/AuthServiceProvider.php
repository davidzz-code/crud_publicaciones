<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('create-post', function(User $user){
            switch($user->role){
                case('SUPER'): // Acceso a todo
                    return true;
                    break;
                case('ADMIN'): // Acceso a crear, ver, editar y eliminar sus posts
                    return true;
                    break;
                case('OWNER'): // Acceso a crear, ver y editar sus posts.
                    return true;
                    break;
                case('GUEST'): // Acceso a ver todos los posts
                    return false;
                    break;
                default:
                    return false;
                    break;
            }   
        });
        Gate::define('edit-post', function(User $user, Post $post){
            switch($user->role){
                case('SUPER'): // Acceso a todo
                    return true;
                    break;
                case('ADMIN'): // Acceso a crear, ver, editar y eliminar sus posts
                    if($post->user_id === $user->id){
                        return true;
                    }
                    return false;
                    break;
                case('OWNER'): // Acceso a ver, editar y eliminar sus posts.
                    if($post->user_id === $user->id){
                        return true;
                    }
                    return false;
                    break;
                case('GUEST'): // Acceso a ver todos los posts
                    return false;
                    break;
                default:
                    return false;
                    break;
            }   
        });
        Gate::define('delete-post', function(User $user, Post $post){
            switch($user->role){
                case('SUPER'): // Acceso a todo
                    return true;
                    break;
                case('ADMIN'): // Acceso a crear, ver, editar y eliminar sus posts
                    if($post->user_id === $user->id){
                        return true;
                    }
                    return false;
                    break;
                case('OWNER'): // Acceso a crear, ver y editar sus posts.
                    return false;
                    break;
                case('GUEST'): // Acceso a ver todos los posts
                    return false;
                    break;
                default:
                    return false;
                    break;
            }   
        });
    }
}
