<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Bind backend repositories here when API and persistence are connected.
    }

    public function boot(): void
    {
        //
    }
}
