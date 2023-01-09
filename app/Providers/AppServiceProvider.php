<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // adminから始まるURL
        if (request()->is('admin*')) {
            config(['session.cookie' => config('session.cookie_admin')]);
        }
        else {
            config(['session.cookie' => config('session.cookie')]);
        }

    }
}
