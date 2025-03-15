<?php

namespace Nion\ModelDatatable\Traits;

use Nion\ModelDatatable\Collections\ModelDatatableCollection;

trait HasDatatable
{
    public function newCollection(array $models = [])
    {
        return new ModelDatatableCollection($models);
    }
}
