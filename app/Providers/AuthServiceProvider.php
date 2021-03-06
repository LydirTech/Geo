<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Outlet' => 'App\Policies\OutletPolicy',
        'App\Model'  => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage_outlet', function () {
            return auth()->check();
        });

        Gate::define('manage_navette', function () {
            return auth()->check();
        });

        Gate::define('manage_chauffeur', function () {
            return auth()->check();
        });
    }
}
