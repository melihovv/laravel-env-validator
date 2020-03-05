<?php

namespace Melihovv\LaravelEnvValidator;

use Illuminate\Validation\Validator;

class EnvValidator
{
    /**
     * @var Validator
     */
    private $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function validate()
    {
        if ($this->validator->fails()) {
            $messages = array_values($this->validator->messages()->all());

            throw EnvValidationFailed::fromMessages($messages);
        }
    }
}
