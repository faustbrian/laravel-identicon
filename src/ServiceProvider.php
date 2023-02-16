<?php

declare(strict_types=1);

namespace PreemStudio\Identicon;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-identicon')
            ->hasConfigFile('laravel-identicon')
            ->hasInstallCommand(fn (InstallCommand $command) => $command->publishConfigFile());
    }
}
