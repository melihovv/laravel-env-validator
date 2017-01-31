<?php

namespace Melihovv\LaravelEnvValidator;

use Illuminate\Contracts\Validation\Validator as ValidatorContract;

class EnvValidator
{
    /**
     * @var ValidatorContract
     */
    private $validator;

    public function __construct(ValidatorContract $validator)
    {
        $this->validator = $validator;
    }

    public function validate()
    {
        if ($this->validator->fails()) {
            $format = 'The :key variable is not defined or invalid';
            $messages = array_values(
                $this->validator->messages()->all($format)
            );

            $message = 'The .env file has some problems.'
                . ' Please check config/laravel-env-validator.php'
                . PHP_EOL
                . implode(PHP_EOL, $messages);

            throw new Exception($message);
        }
    }

    /**
     * @return ValidatorContract
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param ValidatorContract $validator
     * @return EnvValidator
     */
    public function setValidator(ValidatorContract $validator)
    {
        $this->validator = $validator;

        return $this;
    }
}
