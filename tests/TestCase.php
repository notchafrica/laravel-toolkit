<?php

namespace Notchpay\Toolkit\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Notchpay\Toolkit\ToolkitServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Notchpay\\Toolkit\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            ToolkitServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-toolkit_table.php.stub';
        $migration->up();
        */
    }
}
