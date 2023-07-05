<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Incoming Fertilizer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('incoming_fertilizers.update', $incomingFertilizer->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="fertilizer_id" class="block text-gray-700 text-sm font-bold mb-2">Fertilizer:</label>
                            <select name="fertilizer_id" id="fertilizer_id" class="form-select w-full @error('fertilizer_id') border-red-500 @enderror" required>
                                @foreach ($fertilizers as $fertilizer)
                                <option value="{{ $fertilizer->fertilizer_id }}">{{ $fertilizer->name }}</option>
                                @endforeach
                            </select>
                            @error('fertilizer_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantity:</label>
                            <input type="text" name="quantity" id="quantity" class="form-input w-full @error('quantity') border-red-500 @enderror" value="{{ old('quantity', $incomingFertilizer->quantity) }}" required>
                            @error('quantity')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="price_per_unit" class="block text-gray-700 text-sm font-bold mb-2">Price per Unit:</label>
                            <input type="text" name="price_per_unit" id="price_per_unit" class="form-input w-full @error('price_per_unit') border-red-500 @enderror" value="{{ old('price_per_unit', $incomingFertilizer->price_per_unit) }}" required>
                            @error('price_per_unit')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Update Incoming Fertilizer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
