<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Crop Inputs') }}
            </h2>
            <a href="{{ route('crop-inputs.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Add Crop Input
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
                            @foreach($cropInputs as $cropInput)
                                <tr>
                                    <td>{{ $cropInput->crop_input_id }}</td>
                                    <td>{{ $cropInput->crop_id }}</td>
                                    <td>{{ $cropInput->crop_name }}</td>
                                    <td>{{ $cropInput->amount_in_sacs }}</td>
                                    <td>{{ $cropInput->created_at }}</td>
                                    <td>{{ $cropInput->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('crop-inputs.edit', $cropInput->crop_id) }}" class="btn btn-primary text-blue-500">Edit</a>
                                        <form action="{{ route('crop-inputs.destroy', $cropInput->crop_id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger text-red-500" onclick="return confirm('Are you sure you want to delete this crop input?')">Delete</button>
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
