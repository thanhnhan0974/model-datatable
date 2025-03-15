<?php

namespace Nion\ModelDatatable\Providers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\ServiceProvider;

class ModelDataTableServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Load config
        $this->mergeConfigFrom(__DIR__ . '/../../config/model-datatable.php', 'model-datatable');
    }

    public function boot()
    {
        Collection::macro(
            'tables',
            fn() => collect($this)->map(fn($item) => $item->tables())
        );

        // Publish config
        $this->publishes([
            __DIR__ . '/../../config/model-datatable.php' => config_path('model-datatable.php'),
        ], 'config');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'model-datatable');

        $this->commands([
            \Nion\ModelDataTable\Commands\PublishDataTableCommand::class,
        ]);
    }
}
