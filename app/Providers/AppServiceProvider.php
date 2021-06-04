<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ResetPassword::createUrlUsing(function ($notifiable, $token) {
            return config('frontend.url') . "/reset-password/{$token}?email={$notifiable->getEmailForPasswordReset()}";
        });

        // instead of tailwind, uses bootstrap
        Paginator::useBootstrap();

        // in production only uses https
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
