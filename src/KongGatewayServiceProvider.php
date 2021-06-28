<?php

namespace KongGateway;

use Illuminate\Support\ServiceProvider;

class KongGatewayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Configuration
         */
        $this->publishes([
            __DIR__ . '/../config/kong.php' => config_path('kong.php'),
        ], 'kong-config');
        $this->mergeConfigFrom(
            __DIR__ . '/../config/kong.php', 'kong-config'
        );

        /*
         * Commands
         */
        if ($this->app->runningInConsole()) {
            $this->commands([
                \KongGateway\Console\Commands\PublishCommand::class,
                \KongGateway\Console\Commands\TestConnectionCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}