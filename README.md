# Laravel Model Datatable

A simple and powerful package for handling datatables in Laravel applications.

## Installation

You can install the package via composer:

```bash
composer require nion/model-datatable
```

The package will automatically register its service provider.

## Usage

### 1. Publish the configuration (optional)

```bash
php artisan vendor:publish --provider="Nion\ModelDatatable\Providers\ModelDataTableServiceProvider" --tag="config"
```

### 2. Add the trait to your model

```php
use Nion\ModelDatatable\Traits\HasDataTable;

class User extends Model
{
    use HasDataTable;
    
    // Define your columns
    protected $datatableColumns = [
        'id' => 'ID',
        'name' => 'Name',
        'email' => 'Email',
        'created_at' => 'Created At'
    ];
}
```

### 3. In your controller

```php
public function index()
{
    $users = User::datatable();
    
    if (request()->ajax()) {
        return $users;
    }
    
    return view('users.index', compact('users'));
}
```

### 4. In your blade view

```php
<table id="users-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
        </tr>
    </thead>
</table>

@push('scripts')
<script>
$(document).ready(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name'},
            {data: 'email'},
            {data: 'created_at'}
        ]
    });
});
</script>
@endpush
```

## Features

- Server-side processing
- Automatic column handling
- Search functionality
- Sorting functionality
- Pagination
- Custom column formatting
- Relationship handling

## Configuration

You can customize the package behavior by publishing the config file:

```php
// config/model-datatable.php
return [
    'default_per_page' => 15,
    'search_columns' => ['name', 'email'],
    'date_format' => 'Y-m-d H:i:s',
];
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

# Laravel Model DataTable

[![Latest Version](https://img.shields.io/packagist/v/nion/laravel-model-datatable.svg?style=flat-square)](https://packagist.org/packages/nion/laravel-model-datatable)
[![Total Downloads](https://img.shields.io/packagist/dt/nion/laravel-model-datatable.svg?style=flat-square)](https://packagist.org/packages/nion/laravel-model-datatable)
[![License](https://img.shields.io/github/license/nion/laravel-model-datatable.svg?style=flat-square)](LICENSE)

**Laravel Model DataTable** makes it easy to generate **dynamic data tables** directly from Eloquent models in Blade templates.

Supports:
- **Bootstrap**, **Tailwind**, or **Custom Views**
- **Automatic table rendering from models**
- **Customizable and extendable UI**

---

## 🚀 Installation

You can install the package via **Composer**:

```sh
composer require nion/laravel-model-datatable
