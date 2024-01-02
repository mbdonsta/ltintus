<?php

namespace App\Providers;

use App\Contracts\UrlCheckerInterface;
use App\Services\GoogleSafeBrowsing;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UrlCheckerInterface::class, GoogleSafeBrowsing::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
