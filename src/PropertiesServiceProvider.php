<?php

namespace Homeful\Properties;

use Homeful\Properties\Commands\PropertiesCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PropertiesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('properties')
            ->hasConfigFile(['properties'])
            ->hasViews()
            ->hasMigration('create_properties_table')
            ->hasCommand(PropertiesCommand::class);
    }
}
