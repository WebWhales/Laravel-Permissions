<?php

namespace WebWhales\Permissions;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use WebWhales\Permissions\Commands\DeployPermissions;

class ServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('permissions')
            ->hasCommand(DeployPermissions::class)
            ->hasConfigFile(['permissions', 'permission']);
    }
}
