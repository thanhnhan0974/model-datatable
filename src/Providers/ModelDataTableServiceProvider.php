<?php

namespace Jame\ModelDatatable\Providers;

use Illuminate\Support\ServiceProvider;

class ModelDataTableServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Load config
        $this->mergeConfigFrom(__DIR__.'/../../config/model-datatable.php', 'model-datatable');
    }

    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../../config/model-datatable.php' => config_path('model-datatable.php'),
        ], 'config');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'model-datatable');

        $this->commands([
            \Jame\ModelDataTable\Commands\PublishDataTableCommand::class,
        ]);
    }
}
