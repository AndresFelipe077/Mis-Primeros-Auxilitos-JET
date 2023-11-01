<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    view()->composer('*', function ($view) {
      try {
        $cantidadUsuarios = User::has('roles')->count();
      } catch (\Exception $e) {
        // Manejar errores de consulta aquí, si es necesario
        $cantidadUsuarios = 0; // O cualquier valor predeterminado que desees establecer en caso de error
      }
      $view->with('cantidadUsuarios', $cantidadUsuarios);
    });
  }
  
}
