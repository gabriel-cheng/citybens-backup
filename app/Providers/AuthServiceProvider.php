<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('seller-role', function (User $user) {
            return $user->isSeller();
        });

        Gate::define('coordinator-role', function (User $user) {
            return $user->isCoordinator();
        });

        Gate::define('admin-role', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('marketing-role', function (User $user) {
            return $user->isMarketing();
        });
    }
}
