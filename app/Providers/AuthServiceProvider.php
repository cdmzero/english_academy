<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Auth;  


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */


     // Desde aqui restringimos los posibles cambios en los test entre perfiles de profesores
    // Si el usuario autenticado es Admin tiene permiso para todo

    public function boot()
    {
        $this->registerPolicies();



        Gate::define('owner-exam' , function($user, $exam_owner) {

            return $user === $exam_owner || Auth::user()->role === "admin";

        });
    }
}
