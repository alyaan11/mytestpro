<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    // /**
    //  * The policy mappings for the application.
    //  *
    //  * @var array<class-string, class-string>
    //  */
    // protected $policies = [
    //     // Your model => policy mapping (if needed)
    //     // \App\Models\Product::class => \App\Policies\ProductPolicy::class,
    // ];

    // /**
    //  * Register any authentication / authorization services.
    //  */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            if ($user->hasRole('super admin')) {
                return true; // ✅ Superadmin bypasses all checks
            }
        });
    }
}
