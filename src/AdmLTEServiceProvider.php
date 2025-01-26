<?php

namespace Hawkiq\Admlte;

use Illuminate\Support\ServiceProvider;
use Hawkiq\Admlte\Commands\InstallCommand;

class AdmLTEServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../assets' => public_path('vendor/admlte'),
        ], 'admlte-assets');

        $this->publishes([
            __DIR__ . '/../config/admlte.php' => config_path('admlte.php'),
        ], 'admlte-config');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/admlte'),
            __DIR__ . '/../resources/views/components' => resource_path('views/vendor/admlte/components'),
        ], 'admlte-views');

        $this->publishes([
            __DIR__ . '/../lang' => resource_path('lang/vendor/admlte'),
        ], 'admlte-lang');

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'admlte');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'admlte');
    }

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }

        $this->mergeConfigFrom(
            __DIR__ . '/../config/admlte.php',
            'admlte'
        );
    }
}