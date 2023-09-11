<?php

namespace WebWhales\Permissions\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use WebWhales\Permissions\ServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
        config()->set('database.connections.testing', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
        ]);
    }
}
