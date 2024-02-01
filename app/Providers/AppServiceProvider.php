<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::if('petugas', function () {
            return auth()?->user()?->role === 'petugas';
        });
        Blade::if('anggota', function () {
            return auth()?->user()?->role === 'anggota';
        });
        Paginator::useBootstrapFive();
    }
}
