<?php

namespace Registration;

use Illuminate\Support\ServiceProvider;

class RegistrationServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->app->bind('Registration',function($app){
            return new Registration;
        });

        // Define Router file
        require __DIR__ . '/Route/routes.php';

        // Define path for view files
        $this->loadViewsFrom(__DIR__.'/View','RegistrationView');

        // Define path for translation
        $this->loadTranslationsFrom(__DIR__.'/Lang','RegistrationLang');

        // Define Published migrations files
        $this->publishes([
            __DIR__.'/Migration' => database_path('migrations'),
        ], 'migrations');

        // Define Published Asset files
        $this->publishes([
            __DIR__.'/Asset' => public_path('assets/'),
        ], 'public');

    }


    public function register()
    {
        //
    }
}