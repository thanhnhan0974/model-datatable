<?php

namespace Nion\ModelDatatable\Collections;

use Illuminate\Database\Eloquent\Collection;

class ModelDatatableCollection extends Collection
{
    public function tables()
    {
        return $this->map(fn ($item) => $item->tables());
    }
}
