<?php

namespace VanguardLTE\Providers;

use Illuminate\Support\ServiceProvider;

class HtmlServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // Intentionally left blank. Using App\Compat shims and Spatie Html provider for HTML/Form helpers.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // No-op
    }
}
