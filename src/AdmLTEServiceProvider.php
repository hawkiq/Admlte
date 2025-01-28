<?php

namespace Hawkiq\Admlte;

use Illuminate\Support\ServiceProvider;
use Hawkiq\Admlte\Commands\InstallCommand;
use Hawkiq\Admlte\View\Components\Widget;
use Hawkiq\Admlte\View\Components\Form;

class AdmLTEServiceProvider extends ServiceProvider
{
    protected $packageName = 'admlte';

    protected $formComponents = [
        'button' => Form\Button::class,
    ];

    protected $widgetComponents = [
        'alert' => Widget\Alert::class,
        'card' => Widget\Card::class,
        'info-box' => Widget\InfoBox::class,
        'progress' => Widget\Progress::class,
        'small-box' => Widget\SmallBox::class,
    ];

    /**
     * Bootstrap services during the application's booting process.
     */
    public function boot()
    {
        $this->registerPublishing();
        $this->registerTranslations();
        $this->registerViews();
        $this->loadComponents();
    }

    /**
     * Register bindings in the service container.
     */
    public function register()
    {
        $this->registerConsoleCommands();
        $this->mergeConfiguration();
    }

    /**
     * Register resources for publishing.
     */
    protected function registerPublishing()
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
    }

    /**
     * Register translations.
     */
    protected function registerTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../lang', $this->packageName);
    }

    /**
     * Register views.
     */
    protected function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', $this->packageName);
    }

    /**
     * Register console commands.
     */
    protected function registerConsoleCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    /**
     * Merge package configuration with application configuration.
     */
    protected function mergeConfiguration()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/admlte.php',
            $this->packageName
        );
    }

    /**
     * Load the blade view components of the package.
     *
     * @return void
     */

    private function loadComponents()
    {
        // Load all the blade-x components.

        $components = array_merge(
            $this->formComponents,
            $this->widgetComponents
        );

        $this->loadViewComponentsAs($this->packageName, $components);
    }
}