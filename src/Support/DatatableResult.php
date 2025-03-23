<?php

namespace Nion\ModelDatatable\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class DatatableResult
{
    public LengthAwarePaginator $data;
    public Model $model;
    public array $headers;

    public function __construct(LengthAwarePaginator $data, Model $model)
    {
        $this->data = $data;
        $this->model = $model;
        $this->setHeaders();
    }

    private function setHeaders(): static
    {
        $headers = $this->model->datatableColumns ?? $this->model->getFillable();

        foreach ($headers as $key => $header) {
            $this->headers[$key] = $header;
        }

        return $this;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getData(): LengthAwarePaginator
    {
        return new LengthAwarePaginator(
            $this->mapDataWithHeaders(),
            $this->data->total(),
            $this->data->perPage(),
            $this->data->currentPage(),
            ['path' => $this->data->path()]
        );
    }

    /**
     * Map order of data by the headers
     * @return array
     */
    public function mapDataWithHeaders(): array
    {
        $headerKeys = array_keys($this->headers);
        $result = [];

        foreach ($this->data->items() ?? [] as $index => $item) {
            foreach ($headerKeys as $key) {
                $result[$index][$key] = $item->$key;
            }
        }

        return $result;
    }

    public function render()
    {
        return view('model-datatable::table', [
            'data' => $this->getData(),
            'headers' => $this->headers,
        ]);
    }
}
