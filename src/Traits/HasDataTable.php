<?php

namespace Nion\ModelDatatable\Traits;

trait HasDataTable
{
    public function tables()
    {
        return view('model-datatable::table', ['data' => $this]);
    }
}
