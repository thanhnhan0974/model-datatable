<?php

namespace Laravel\ModelDatatable\Tests;

use Illuminate\Support\Facades\View;

class ViewTest extends TestCase
{
    public function test_it_can_render_table_view()
    {
        $html = View::make('model-datatable::table', ['data' => ['id' => 1, 'name' => 'Test']])->render();

        $this->assertStringContainsString('<table', $html);
        $this->assertStringContainsString('Test', $html);
    }
}
