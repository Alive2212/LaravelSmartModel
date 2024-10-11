<?php

namespace Alive2212\LaravelSmartModel;

use Illuminate\Support\ServiceProvider;

class LaravelSmartModelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'alive2212');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'alive2212');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-smart-model.php', 'laravel-smart-model');

        // Register the service the package provides.
        $this->app->singleton('laravel-smart-model', function ($app) {
            return new LaravelSmartModel;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-smart-model'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravel-smart-model.php' => config_path('laravel-smart-model.php'),
        ], 'laravel-smart-model.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/alive2212'),
        ], 'laravel-smart-model.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/alive2212'),
        ], 'laravel-smart-model.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/alive2212'),
        ], 'laravel-smart-model.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
