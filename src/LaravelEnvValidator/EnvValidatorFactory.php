<?php

namespace Melihovv\LaravelEnvValidator;

use Illuminate\Contracts\Validation\Validator;

class EnvValidatorFactory
{
    public static function buildFromValidator(Validator $validator)
    {
        return new EnvValidator($validator);
    }

    public static function buildFromLaravelConfig()
    {
        $config = config('laravel-env-validator.rules', []);

        $env = [];
        foreach (array_keys($config) as $variable) {
            $env[$variable] = env($variable);
        }

        $validator = \Validator::make($env, $config);

        return static::buildFromValidator($validator);
    }
}
