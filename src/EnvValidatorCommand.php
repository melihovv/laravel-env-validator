<?php

namespace Melihovv\LaravelEnvValidator;

use Illuminate\Console\Command;

class EnvValidatorCommand extends Command
{
    protected $signature = 'config:env-validator';

    protected $description = 'Validate variables in the .env file';

    public function handle()
    {
        $validator = EnvValidatorFactory::buildFromLaravelConfig();
        $validator->validate();

        $this->info('All env variables validated successfully');
    }
}
