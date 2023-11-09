<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();

        $cantidadUsuarios = User::has('roles')->count();

        View::composer('*', function ($view) use ($cantidadUsuarios) {
            $view->with('cantidadUsuarios', $cantidadUsuarios);
        });

    }
}
