<?php

namespace Nion\ModelDataTable\Commands;

use Illuminate\Console\Command;

class PublishDataTableCommand extends Command
{
    protected $signature = 'datatable:publish';
    protected $description = 'Publish the DataTable configuration and views';

    public function handle()
    {
        $this->call('vendor:publish', ['--tag' => 'config']);
        $this->info('DataTable configuration published.');
    }
}
