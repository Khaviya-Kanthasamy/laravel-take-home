<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /** 
         * This forces Laravel to always generate URLs using HTTPS
         * when the application is running in the "production" environment.
         * 
         * It affects:
         * - asset URLs (CSS, JS, images)
         * - route URLs
         * - redirects
         * 
         * This is commonly used behind proxies (like Railway, Heroku, etc.)
         * to avoid generating HTTP URLs when the site is actually served over HTTPS.
         */
    
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
