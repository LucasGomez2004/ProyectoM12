<?php

namespace App\Providers;

use Illuminate\Auth\Access\Response;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        Gate::define('admin', function (User $user){
            
            if ($user->role_id == 1) {
                return Response::allow();
            }

            return Response::deny('No tiene permiso para acceder');
        });

        Gate::define('client', function (User $user){

            if ($user->role_id == 2) {
                return Response::allow();
            }

            return Response::deny('No tiene permiso para acceder');
        });
    }
}
