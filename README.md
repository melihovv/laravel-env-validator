Laravel Env Validator
=====================

[![Build Status](https://travis-ci.org/melihovv/laravel-env-validator.svg?branch=master)](https://travis-ci.org/melihovv/laravel-env-validator)
[![styleci](https://styleci.io/repos/78041678/shield)](https://styleci.io/repos/78041678)
[![Coverage Status](https://coveralls.io/repos/github/melihovv/laravel-env-validator/badge.svg?branch=master)](https://coveralls.io/github/melihovv/laravel-env-validator?branch=master)

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

### Register Service Provider

Note! It is optional step if you use laravel>=5.5 with package auto discovery
feature.

Add Service Provider to `config/app.php` in `providers` section
```php
Melihovv\LaravelEnvValidator\ServiceProvider::class,
```

### Publish configuration file

```
php artisan vendor:publish --provider="Melihovv\LaravelEnvValidator\ServiceProvider" --tag="config"
```

## Example configuration file
```php
// config/laravel-env-validator.php
<?php

return [
    'live_validation' => false,
    'rules' => [
        'SOME_IMPORTANT_VARIABLE' => 'required',
        'ANOTHER_IMPORTANT_ONE'   => 'required|in:TYPE_A,TYPE_B,TYPE_C',
    ],
];
```

## Usage
In case you set `live_validation` to `false` in config, you may use artisan
command
```
php artisan config:env-validator
```
Otherwise env variables will be validated on every application start.

## Security

If you discover any security related issues, please email amelihovv@ya.ru instead of using the issue tracker.

## Credits

- [Alexander Melihov](https://github.com/melihovv)
- [Mathias Grimm](https://github.com/mathiasgrimm)
- [David Stroker](https://github.com/davidstoker)
- [All contributors](https://github.com/melihovv/laravel-env-validator/graphs/contributors)
