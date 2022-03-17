<?php

namespace KMA\IikoTransport;

use Illuminate\Support\ServiceProvider;

class IikoTransportServiceProvider extends ServiceProvider
{
    /** Boot the service provider. */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/iiko_transport.php' => config_path('iiko_transport.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/iiko_transport.php', 'iiko_transport');

        // Register the main class to use with the facade
        $this->app->bind('IikoTransport', function ($app) {
            $config = app('config')->get('iiko_transport');
            return new IikoTransport($config);
        });
    }
}
