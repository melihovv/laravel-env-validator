<?php

namespace Melihovv\LaravelEnvValidator;

class EnvValidatorFactory
{
    public static function buildFromLaravelConfig()
    {
        $config = config('laravel-env-validator.rules', []);

        $env = [];
        foreach (array_keys($config) as $variable) {
            $env[$variable] = env($variable);
        }

        $validator = \Validator::make($env, $config);

        $varsNames = array_keys($env);
        $validator->setAttributeNames(array_combine($varsNames, $varsNames));

        return new EnvValidator($validator);
    }
}
