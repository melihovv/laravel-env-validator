<?php

namespace Melihovv\LaravelEnvValidator;

use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{
    const CONFIG_PATH = __DIR__.'/../config/env-validator.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('env-validator.php'),
        ], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands([EnvValidatorCommand::class]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(self::CONFIG_PATH, 'env-validator');
    }
}
