<?php

namespace Notch\Toolkit;

use Notch\Toolkit\Commands\CurrencyCleanup;
use Notch\Toolkit\Commands\CurrencyHydrate;
use Notch\Toolkit\Commands\CurrencySeed;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasConfigFile('notch-toolkit')
            ->hasMigration('create_currency_table')
            ->hasCommand(CurrencyHydrate::class)
            ->hasCommand(CurrencySeed::class)
            ->hasCommand(CurrencyCleanup::class);
    }
}
