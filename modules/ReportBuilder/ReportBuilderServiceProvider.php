<?php

namespace ReportBuilder;

use Illuminate\Support\ServiceProvider;

class ReportBuilderServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->app->bind('ReportBuilder',function($app){
            return new ReportBuilder;
        });

        // Define Router file
        require __DIR__ . '/Route/routes.php';

        // Define path for view files
        $this->loadViewsFrom(__DIR__.'/View','ReportBuilderView');

        // Define path for translation
        $this->loadTranslationsFrom(__DIR__.'/Lang','ReportBuilderLang');

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