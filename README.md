# Lara Maintenance

Puts the application into maintenance mode for all IPs that are not configured as an exception.

## Requirements

PHP: >=7.2

## Install

```bash
$ composer require rockbuzz/lara-maintenance
```

## Configuration

```bash
$ php artisan vendor:publish --provider="Rockbuzz\LaraMaintenance\ServiceProvider" --tag="config"
```

## Usage
### In App\Http\Kernel
```php
protected $middleware = [
        \Rockbuzz\LaraMaintenance\Authorize::class,
        ...
    ];
```
### In .env
```php
APP_MAINTENANCE_MODE=true
APP_MAINTENANCE_EXCEPT="127.0.0.2, 127.0.0.3"
```
## License

The Lara Maintenance is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).