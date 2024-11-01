<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Crop Output') }}
            </h2>
            <a href="{{ route('crop-outputs.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8">
                    <form action="{{ route('crop-outputs.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="crop_id" class="block mb-2 text-sm font-medium text-gray-900">Crop ID</label>
                            <select name="crop_id" id="crop_id" class="form-select w-full @error('crop_id') border-red-500 @enderror" required>
                                @foreach ($crops as $crop)
                                <option value="{{ $crop->crop_id }}">{{ $crop->crop_name }}</option>
                                @endforeach
                            </select>
                            @error('crop_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="amount_in_sacs" class="block mb-2 text-sm font-medium text-gray-900">Amount in Sacs</label>
                            <input type="text" name="amount_in_sacs" id="amount_in_sacs" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                Add Crop Output
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
