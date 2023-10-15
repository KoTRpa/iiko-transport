<?php

namespace KMA\IikoTransport;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class IikoTransportServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/iiko_transport.php' => config_path('iiko_transport.php'),
            ], 'config');
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/iiko_transport.php', 'iiko_transport');

        $this->app->bindIf(IikoTransport::class, function () {
            $config = config('iiko_transport');
            return new IikoTransport($config);
        });
    }

    public function provides(): array
    {
        return [IikoTransport::class];
    }
}
