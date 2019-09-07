<?php

namespace Melihovv\LaravelEnvValidator;

use Illuminate\Support\ServiceProvider as Provider;
use Melihovv\LaravelEnvValidator\Console\EnvValidatorCommand;

class ServiceProvider extends Provider
{
    const CONFIG_PATH = __DIR__ . '/../config/laravel-env-validator.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('laravel-env-validator.php'),
        ], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands([EnvValidatorCommand::class]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(self::CONFIG_PATH, 'laravel-env-validator');
    }
}
