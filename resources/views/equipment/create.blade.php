<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Equipment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8">
                    <form method="POST" action="{{ route('equipment.store') }}">
                        @csrf

                        <div class="mb-6">
                            <label for="equipment-name" class="block mb-2 text-sm font-medium text-gray-900">Equipment Name</label>
                            <input type="text" id="equipment-name" name="equipment_name" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" value="{{ old('equipment_name') }}">
                            @error('equipment_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="equipment-type" class="block mb-2 text-sm font-medium text-gray-900">Equipment Type</label>
                            <input type="text" id="equipment-type" name="type" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" value="{{ old('type') }}">
                            @error('type')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="equipment-serial" class="block mb-2 text-sm font-medium text-gray-900">Equipment Serial</label>
                            <input type="text" id="equipment-serial" name="serial" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" value="{{ old('serial') }}">
                            @error('serial')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                Create Equipment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
