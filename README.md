Laravel Env Validator
=====================

[![GitHub Workflow Status](https://github.com/melihovv/laravel-env-validator/workflows/Run%20tests/badge.svg)](https://github.com/melihovv/laravel-env-validator/actions)
[![styleci](https://styleci.io/repos/78041678/shield)](https://styleci.io/repos/78041678)

[![Packagist](https://img.shields.io/packagist/v/melihovv/laravel-env-validator.svg)](https://packagist.org/packages/melihovv/laravel-env-validator)
[![Packagist](https://poser.pugx.org/melihovv/laravel-env-validator/d/total.svg)](https://packagist.org/packages/melihovv/laravel-env-validator)
[![Packagist](https://img.shields.io/packagist/l/melihovv/laravel-env-validator.svg)](https://packagist.org/packages/melihovv/laravel-env-validator)

Laravel Env Validator is meant to validate your .env file in order to avoid any
unexpected behaviour for not having properly defined some variable or value.

### Highlights

- Make sure you don't go live without all required .env variables and without the correct values
- Validate you env variables using the Laravel Validator by simple defining rules in a configuration file
- Working in teams becomes easier

## Installation

Install via composer
```
composer require melihovv/laravel-env-validator
```

### Publish configuration file

```
php artisan vendor:publish --provider="Melihovv\LaravelEnvValidator\ServiceProvider" --tag="config"
```

## Example configuration file
```php
// config/env-validator.php
<?php

return [
    'rules' => [
        'APP_NAME' => 'required|string',
        'APP_ENV'  => 'in:local,production',
    ],
];
```

## Usage
Simply run following command
```
php artisan config:env-validator
```

## Security

If you discover any security related issues, please email amelihovv@ya.ru instead of using the issue tracker.

## Credits

- [Alexander Melihov](https://github.com/melihovv)
- [Mathias Grimm](https://github.com/mathiasgrimm)
- [David Stroker](https://github.com/davidstoker)
- [All contributors](https://github.com/melihovv/laravel-env-validator/graphs/contributors)
