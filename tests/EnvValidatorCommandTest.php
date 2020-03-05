<?php

namespace Melihovv\LaravelEnvValidator\Tests;

use Illuminate\Support\Facades\Config;
use Melihovv\LaravelEnvValidator\EnvValidationFailed;
use Melihovv\LaravelEnvValidator\ServiceProvider;
use Orchestra\Testbench\TestCase;

class EnvValidatorCommandTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    /** @test */
    public function it_has_the_right_error_message()
    {
        try {
            putenv('VAR_1');
            putenv('VAR_2');

            Config::set('env-validator.rules', [
                'VAR_1' => 'required',
                'VAR_2' => 'required',
            ]);

            $this->artisan('config:env-validator');
        } catch (EnvValidationFailed $e) {
            $this->assertStringContainsString(
                'VAR_1',
                $e->getMessage()
            );
            $this->assertStringContainsString(
                'VAR_2',
                $e->getMessage()
            );
            $this->assertStringContainsString(
                'required',
                $e->getMessage()
            );
        }
    }

    /** @test */
    public function it_does_not_throw_exception_if_validation_is_met()
    {
        putenv('VAR_1=123');
        putenv('VAR_2=A');

        Config::set('env-validator.rules', [
            'VAR_1' => 'required',
            'VAR_2' => 'required|in:A,B,C',
        ]);

        $this->artisan('config:env-validator');

        $this->assertTrue(true);
    }

    /** @test */
    public function it_doest_not_throw_exception_if_no_configuration_is_defined()
    {
        Config::set('env-validator.rules', []);

        $this->artisan('config:env-validator');

        $this->assertTrue(true);
    }
}
