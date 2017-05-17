<?php

namespace Afrittella\ItalianCities;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class ItalianCitiesServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot(Router $router)
    {
        // use the vendor configuration file as fallback
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'italian-cities'
        );

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadMigrationsFrom(realpath(__DIR__.'/../database/migrations'));

        $this->publishFiles();

        $this->registerCommands();
    }

    public function register()
    {

    }

    private function publishFiles()
    {
        // publish config file
        $this->publishes([__DIR__ . '/../config/config.php' => config_path() . '/italian-cities.php'], 'config');
    }

    public function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Afrittella\ItalianCities\Console\Commands\SeedCountries::class,
            ]);
        }
    }
}