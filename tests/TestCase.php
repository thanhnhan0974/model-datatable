<?php

namespace Jame\ModelDatatable\Tests;

use Jame\ModelDatatable\Providers\ModelDataTableServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ModelDataTableServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [];
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->app['config']->set('model-datatable', require __DIR__ . '/../config/model-datatable.php');
    }
}
