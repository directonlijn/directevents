<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Resource routes localization
        \Route::resourceVerbs([
            'create' => 'aanmaken',
            'edit' => 'wijzigen',
            'store' => 'opslaan',
            'update' => 'update',
            'destroy' => 'verwijderen',
            'show' => 'tonen',
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
