<!-- crop_difference.blade.php -->

<table>
    <thead>
        <tr>
            <th>Crop ID</th>
            <th>Crop Name</th>
            <th>Total Input</th>
            <th>Total Output</th>
            <th>Difference</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($differences as $difference)
        <tr>
            <td>{{ $difference->crop_id }}</td>
            <td>{{ $difference->crop_name }}</td>
            <td>{{ $difference->total_input }}</td>
            <td>{{ $difference->total_output }}</td>
            <td>{{ $difference->difference }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
