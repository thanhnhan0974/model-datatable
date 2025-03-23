<?php

namespace Nion\ModelDatatable\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Nion\ModelDatatable\Support\DatatableResult;

trait HasDatatable
{

    /**
     * Method to get the data and method to render the datatable.
     */
    public static function tables()
    {
        try {
            $query = self::query();
            $model = $query->getModel();
            $perPage = $model->getPerPage();

            if ($query instanceof Builder) {
                $data = $query->paginate($perPage);
            }

            if ($query instanceof Collection) {
                $data = $query->paginate($perPage);
            }

            if ($query instanceof Model) {
                $data = $query->paginate($perPage);
            }

            return new DatatableResult($data, $model);
        } catch (\Exception $e) {
            throw new \Exception('Error rendering datatable: ' . $e->getMessage());
        }
    }
}
