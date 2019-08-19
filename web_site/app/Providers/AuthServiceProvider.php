<?php

namespace App\Providers;

/* use Illuminate\Contracts\Auth\Access\Gate as GateContract; */
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
    public function boot()
    {
        $this->registerPolicies();

        /* Gate::define('isCaissier', function ($admin) {
        return $admin->job_title == 'caissier';
        });

        Gate::define('isAdmin', function ($admin) {
        return $admin->job_title == 'admin';
        });

        Gate::define('isCuisinier', function ($admin) {
        return $admin->job_title == 'cuisinier';
        });

        Gate::define('isManager', function ($admin) {
        return $admin->job_title == 'manager';
        });
         */
        //
    }
}
