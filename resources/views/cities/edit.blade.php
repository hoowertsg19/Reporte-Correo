<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
                {{ __('Editar Ciudad') }}
            </h2>
            <a href="{{ route('cities.index') }}"
                class="text-white bg-gradient-to-r from-blue-600 to-blue-400 hover:from-blue-700 hover:to-blue-500 font-semibold py-2 px-4 rounded shadow-md transition">
                {{ __('Volver a Ciudades') }}
            </a>
        </div>
    </x-slot>

    <div class="max-w-lg mx-auto mt-10 px-4">
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg p-8">
            <form action="{{ route('cities.update', $city->id) }}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">
                        Nombre
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name', $city->name) }}"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 shadow focus:ring-2 focus:ring-blue-400 focus:outline-none transition"
                        placeholder="Nombre de la ciudad">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">
                        Descripción
                    </label>
                    <textarea name="description" id="description" rows="3"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 shadow focus:ring-2 focus:ring-blue-400 focus:outline-none transition"
                        placeholder="Descripción de la ciudad">{{ old('description', $city->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-gradient-to-r from-blue-600 to-blue-400 hover:from-blue-700 hover:to-blue-500 text-white font-semibold py-2 px-6 rounded shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                        Actualizar Ciudad
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>