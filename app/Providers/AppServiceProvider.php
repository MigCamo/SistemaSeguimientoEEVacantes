<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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

     //cambiar la siguiente función con base en tu variable APP_ENV
    public function boot()
    {
        if (env('APP_ENV') === 'development') {
        	URL::forceScheme('https');
    	}
    }
}
