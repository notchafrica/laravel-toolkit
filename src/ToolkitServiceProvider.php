<?php

namespace Notchpay\Toolkit;

use Notchpay\Toolkit\Commands\CurrencyCleanup;
use Notchpay\Toolkit\Commands\CurrencyHydrate;
use Notchpay\Toolkit\Commands\CurrencySeed;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Notchpay\Toolkit\Commands\ToolkitCommand;

class ToolkitServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-toolkit')
            ->hasConfigFile('notchpay-toolkit')
            ->hasMigration('create_currency_table')
            ->hasCommand(CurrencyHydrate::class)
            ->hasCommand(CurrencySeed::class)
            ->hasCommand(CurrencyCleanup::class);
    }
}
