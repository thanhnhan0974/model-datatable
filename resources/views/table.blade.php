@if (config('model-datatable.ui') === 'bootstrap')
    <table class="table table-striped">
    @elseif(config('model-datatable.ui') === 'tailwind')
        <table class="min-w-full border border-gray-300">
        @else
            <table>
@endif
@if (!empty($data))
    <thead>
        <tr>
            @foreach ($headers as $header)
                <th>{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($data->items() as $row)
            <tr>
                @foreach ($row as $value)
                    <td>{{ $value }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
    </table>
@endif
