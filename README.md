# Laravel-toolkit


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require notchafrica/laravel-toolkit
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-toolkit-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-toolkit-config"
```

This is the contents of the published config file:

```php
return [
    "currency" => [
        'default' => 'USD',

        /*
        |--------------------------------------------------------------------------
        | API Key for FOREXAPI
        |--------------------------------------------------------------------------
        |
        | Only required if you with to use the Open Exchange Rates api. You can
        | always just use Yahoo, the current default.
        |
        */

            'api_key' => env(
                "RESTUNIVERE_API_KEY",
            ),

        /*
        |--------------------------------------------------------------------------
        | Default Storage Driver
        |--------------------------------------------------------------------------
        |
        | Here you may specify the default storage driver that should be used
        | by the framework.
        |
        | Supported: "database", "filesystem", "Model"
        |
        */

            'driver' => 'filesystem',

        /*
        |--------------------------------------------------------------------------
        | Default Storage Driver
        |--------------------------------------------------------------------------
        |
        | Here you may specify the default cache driver that should be used
        | by the framework.
        |
        | Supported: all cache drivers supported by Laravel
        |
        */

        'cache_driver' => null,

        /*
        |--------------------------------------------------------------------------
        | Storage Specific Configuration
        |--------------------------------------------------------------------------
        |
        | Here you may configure as many storage drivers as you wish.
        |
        */

        'drivers' => [

            'database' => [
                'class' => \Notch\Toolkit\Currency\Drivers\Database::class,
                'connection' => null,
                'table' => 'currencies',
            ],

            'filesystem' => [
                'class' => \Notch\Toolkit\Currency\Drivers\Filesystem::class,
                'disk' => "local",
                'path' => 'currencies.json',
            ],

            'model' => [
                'table' => 'currencies',
                'class' => \Notch\Toolkit\Currency\Models\Currency::class
            ],

        ],

        /*
        |--------------------------------------------------------------------------
        | Currency Formatter
        |--------------------------------------------------------------------------
        |
        | Here you may configure a custom formatting of currencies. The reason for
        | this is to help further internationalize the formatting past the basic
        | format column in the table. When set to `null` the package will use the
        | format from storage.
        |
        |
        */

        'formatter' => null,

        /*
        |--------------------------------------------------------------------------
        | Currency Formatter Specific Configuration
        |--------------------------------------------------------------------------
        |
        | Here you may configure as many currency formatters as you wish.
        |
        */

        'formatters' => [

            'php_intl' => [
                'class' => \Notch\Toolkit\Currency\Formatters\PHPIntl::class,
            ],

        ],
    ]
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-toolkit-views"
```

## Currency

The Laravel Currency Toolkit makes it easy to implement multi-currency pricing into your application and store the exchange data for fast real-time conversions.

### Usage

The simplest way to use these methods is through the helper function `currency()` or by using the facade. For the examples below we will use the helper method.

#### Converting

This is a shortcut to the most commonly used `convert` method, which converts the given amount into the provided currency.

```php
currency($amount, $from = null, $to = null, $format = true)
```

**Arguments:**

`$amount` - The float amount to convert
`$from` - The current currency code of the amount. If not set, the application default will be used (see `config/notchpay-toolkit.php` file).
`$to` - The currency code to convert the amount to. If not set, the user-set currency is used.
`$format` - Should the returned value be formatted.

**Usage:**

```php
echo currency(12.00);               // Will format the amount using the user selected currency
echo currency(12.00, 'USD', 'EUR'); // Will format the amount from the default currency to EUR
```

#### Formatting

Quickly parse a given amount into the proper currency format. This is a shortcut to the most commonly used `format` method.

```php
currency_format($amount, $code = null)
```

### Manage

Easily add, update, or delete currencies from the default storage. This is extremely helpful when there are changes to currency data, such as symbols and such.

```
php artisan currency:<action>
```

**Arguments:**

```
 action              Action to perform (hydrate, seed, or cleanup)
```

### Seed

Used to seed currencies in local database

```bash
php artisan currency:seed
```

### Updating Exchange

Update exchange rates from restuniverse.com An API key is needed to use [Rest Universe](http://restuniverse.com). Add yours to the config file.

```bash
php artisan currency:hydrate
```

> Note: Yahoo has discontinued the use of their exchange rate API, so it has been removed from the package.

### Cleanup

Used to clean the Laravel cached exchanged rates and refresh it from the database. Note that cached exchanged rates are cleared after they are updated using one of the command above.

```bash
php artisan currency:cleanup
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [chapdel](https://github.com/chapdel)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
