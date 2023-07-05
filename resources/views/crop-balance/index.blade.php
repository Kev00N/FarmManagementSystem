<!-- resources/views/crop-balance/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Crop Inventory') }}
            </h2>
        </div>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table id="crop-balances-table">
                    <thead>
                        <tr>
                            <th>Crop ID</th>
                            <th>Crop Name</th>
                            <th>Total Input</th>
                            <th>Total Output</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($balances as $balance)
                            <tr>
                                <td class="text-center">{{ $balance->crop_id }}</td>
                                <td class="text-center">{{ $balance->crop_name }}</td>
                                <td class="text-center">{{ $balance->total_input }}</td>
                                <td class="text-center">{{ $balance->total_output }}</td>
                                <td class="text-center">{{ $balance->balance }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
                <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
            
                <style>
                    .dataTables_wrapper td.text-center {
                        text-align: center;
                    }
                </style>
            
                <script>
                    $(document).ready(function() {
                        $('#crop-balances-table').DataTable();
                    });
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
