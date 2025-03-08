<?php

namespace Laravel\ModelDatatable\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Laravel\ModelDatatable\Providers\ModelDataTableServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ModelDataTableServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [];
    }

    protected function setUp(): void
    {
        parent::setUp();

        // Load config của package để test không lỗi
        $this->app['config']->set('model-datatable', require __DIR__ . '/../config/model-datatable.php');
    }
}
