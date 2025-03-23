<?php

return [
    'ui' => env('MODEL_DATATABLE_UI', 'bootstrap'), // bootstrap, tailwind, custom
    'default_per_page' => 15,
    'search_columns' => ['name', 'email'],
    'date_format' => 'Y-m-d H:i:s',
];
