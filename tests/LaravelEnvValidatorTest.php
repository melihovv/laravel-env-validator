<?php

namespace Melihovv\LaravelEnvValidator\Tests;

use Melihovv\LaravelEnvValidator\EnvValidatorFactory;
use Melihovv\LaravelEnvValidator\Exception;
use Orchestra\Testbench\TestCase;

class LaravelEnvValidatorTest extends TestCase
{
    /** @test */
    public function it_has_the_right_error_message()
    {
        try {
            putenv('VAR_1');
            putenv('VAR_2');

            \Config::set('laravel-env-validator.rules', [
                'VAR_1' => 'required',
                'VAR_2' => 'required',
            ]);
            $envValidator = EnvValidatorFactory::buildFromLaravelConfig();
            $envValidator->validate();
        } catch (Exception $e) {
            $this->assertContains(
                'The VAR_1 variable is not defined or invalid',
                $e->getMessage()
            );
            $this->assertContains(
                'The VAR_2 variable is not defined or invalid',
                $e->getMessage()
            );
        }
    }

    /** @test */
    public function it_does_not_throw_exception_if_validation_is_met()
    {
        putenv('VAR_1=123');
        putenv('VAR_2=A');

        \Config::set('laravel-env-validator.rules', [
            'VAR_1' => 'required',
            'VAR_2' => 'required|in:A,B,C',
        ]);
        $envValidator = EnvValidatorFactory::buildFromLaravelConfig();
        $envValidator->validate();
    }

    /** @test */
    public function it_doest_not_throw_exception_if_no_configuration_is_defined()
    {
        $envValidator = EnvValidatorFactory::buildFromLaravelConfig();
        $envValidator->validate();
    }
}
