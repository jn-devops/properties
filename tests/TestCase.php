<?php

namespace Homeful\Properties\Tests;

use Homeful\Properties\PropertiesServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\SchemalessAttributes\SchemalessAttributesServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Homeful\\Properties\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            PropertiesServiceProvider::class,
            SchemalessAttributesServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        config()->set('data.validation_strategy', 'always');
        config()->set('data.max_transformation_depth', 5);
        config()->set('data.throw_when_max_transformation_depth_reached', 5);

        $migration = include __DIR__.'/../database/migrations/create_properties_table.php.stub';
        $migration->up();
    }
}
