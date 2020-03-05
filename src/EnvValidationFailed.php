<?php

namespace Melihovv\LaravelEnvValidator;

use Exception;

class EnvValidationFailed extends Exception
{
    public static function fromMessages(array $messages): self
    {
        $message = sprintf(
            'The .env file has some problems. Please check config/env-validator.php%s%s',
            PHP_EOL,
            implode(PHP_EOL, $messages)
        );

        return new self($message);
    }
}
