<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        UserStory::class => UserStoryPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //

        // If user has backoffice role grant all permissions
        Gate::before(function ($user) {
            if ($user->hasRole('Backoffice') || $user->hasRole('SuperAdmin')) {
                return true;
            }
        });
    }
}
