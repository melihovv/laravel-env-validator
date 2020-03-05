<?php

namespace Melihovv\LaravelEnvValidator;

use Illuminate\Support\Facades\Validator;

class EnvValidatorFactory
{
    public static function buildFromLaravelConfig()
    {
        $config = config('env-validator.rules', []);

        $env = [];
        foreach (array_keys($config) as $variable) {
            $env[$variable] = env($variable);
        }

        $validator = Validator::make($env, $config);

        $varsNames = array_keys($env);
        $validator->setAttributeNames(array_combine($varsNames, $varsNames));

        return new EnvValidator($validator);
    }
}
