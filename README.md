# Laravel Micro Service Mono Logger

[![Build Status](https://travis-ci.org/mont4/micro-service-logger.svg?branch=master)](https://travis-ci.org/mont4/micro-service-logger)
[![styleci](https://styleci.io/repos/CHANGEME/shield)](https://styleci.io/repos/CHANGEME)
[![Coverage Status](https://coveralls.io/repos/github/mont4/micro-service-logger/badge.svg?branch=master)](https://coveralls.io/github/mont4/micro-service-logger?branch=master)

[![Packagist](https://img.shields.io/packagist/v/mont4/micro-service-logger.svg)](https://packagist.org/packages/mont4/micro-service-logger)
[![Packagist](https://poser.pugx.org/mont4/micro-service-logger/d/total.svg)](https://packagist.org/packages/mont4/micro-service-logger)
[![Packagist](https://img.shields.io/packagist/l/mont4/micro-service-logger.svg)](https://packagist.org/packages/mont4/micro-service-logger)


## Installation

Install via composer
```bash
composer require mont4/micro-service-logger
```

Add blew codes to config/logging.php
```php
<?php

...

return [

    ...

    'channels' => [
        ...

        'MicroServiceLogger' => [
            'driver'  => 'monolog',
            'handler' => Mont4\MicroServiceLogger\LogHandler::class,
            'tap'     => [
                'Mont4\MicroServiceLogger\Formatter\CustomizeFormatter'
            ],
        ]
    ]
];
```


### Publish Configuration File

```bash
php artisan vendor:publish --provider="Mont4\MicroServiceLogger\ServiceProvider" --tag="config"
```

## Usage

CHANGE ME

## Security

If you discover any security related issues, please email 
instead of using the issue tracker.

## Credits

- [Mont](https://github.com/mont4/micro-service-logger)
- [All contributors](https://github.com/mont4/micro-service-logger/graphs/contributors)

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).
