<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Crop Outputs') }}
            </h2>
            <a href="{{ route('crop-outputs.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Add Crop Output
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th data-priority="1" class="text-left">ID</th>
                                <th data-priority="2" class="text-left">Crop ID</th>
                                <th data-priority="3" class="text-left">Crop</th>
                                <th data-priority="4" class="text-left">Amount in Sacs</th>
                                <th data-priority="5" class="text-left">Created at</th>
                                <th data-priority="6" class="text-left">Updated at</th>
                                <th data-priority="7" class="text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cropOutputs as $cropOutput)
                                <tr>
                                    <td>{{ $cropOutput->id }}</td>
                                    <td>{{ $cropOutput->crop_id }}</td>
                                    <td>{{ $cropOutput->crop_name }}</td>
                                    <td>{{ $cropOutput->amount_in_sacs }}</td>
                                    <td>{{ $cropOutput->created_at }}</td>
                                    <td>{{ $cropOutput->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('crop-outputs.edit', $cropOutput->crop_output_id) }}" class="btn btn-primary text-blue-500">Edit</a>
                                        <form action="{{ route('crop-outputs.destroy', $cropOutput->crop_output_id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger text-red-500" onclick="return confirm('Are you sure you want to delete this crop output?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
