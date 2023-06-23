<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Crops') }}
            </h2>
            <a href="{{ route('crops.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Create New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1" class="text-left">Crop ID</th>
                                <th data-priority="2" class="text-left">Name</th>
                                <th data-priority="3" class="text-left">Type</th>
                                <th data-priority="4" class="text-left">Created at</th>
                                <th data-priority="5" class="text-left">Updated at</th>
                                <th data-priority="6" class="text-left">Actions</th>
                                <!-- Add more columns as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through your crops data and generate rows dynamically -->
                            @foreach($crops as $crop)
                            <tr>
                                <td>{{ $crop->crop_id }}</td>
                                <td>{{ $crop->crop_name }}</td>
                                <td>{{ $crop->crop_type }}</td>
                                <td>{{ $crop->created_at }}</td>
                                <td>{{ $crop->updated_at }}</td>
                                <td>
                                    <a href="{{ route('crops.edit', ['crop' => $crop->crop_id]) }}" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                                    <form action="{{ route('crops.destroy', ['crop' => $crop->crop_id]) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger text-red-500" onclick="return confirm('Are you sure you want to delete this crop?')" >Delete</button>
                                    </form>
                                </td>
                                <!-- Add more columns as needed -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
