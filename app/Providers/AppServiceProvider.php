<?php

namespace App\Providers;

// use Illuminate\Contracts\Pagination\Paginator; // je l'ai decommenté
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; //c'est moi qui l'ai ajouter

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
        // C'est moi qui l'aiajouter Pour pouvoir utiliser la paginatoion de bootstrap
        Paginator::useBootstrap();
    }
}
