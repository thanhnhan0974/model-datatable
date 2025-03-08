<?php

use Laravel\ModelDatatable\Traits\HasDataTable;
use PHPUnit\Framework\TestCase;

class ModelDataTableTest extends TestCase
{
    public function test_trait_can_be_used()
    {
        $mockModel = new class {
            use HasDataTable;
        };

        $this->assertTrue(method_exists($mockModel, 'tables'));
    }
}
