<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Crear Ciudad') }}
            </h2>
            <a href="{{ route('cities.index') }}"
                class="text-white bg-blue-600 hover:bg-blue-700 transition-colors font-semibold py-2 px-4 rounded shadow">
                {{ __('Volver a Ciudades') }}
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-100 dark:bg-gray-900 min-h-screen transition-colors">
        <div class="max-w-sm mx-auto">
            <div class="bg-white dark:bg-gray-800 shadow-lg dark:shadow-xl rounded-xl p-6 transition-colors">
                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4 text-center">
                    Nueva Ciudad
                </h3>
                <form method="POST" action="{{ route('cities.store') }}">
                    @csrf

                    <!-- Campo Nombre -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 dark:text-gray-200 text-sm font-medium mb-1">
                            Nombre
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="border border-gray-300 dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 transition">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Descripción -->
                    <div class="mb-5">
                        <label for="description" class="block text-gray-700 dark:text-gray-200 text-sm font-medium mb-1">
                            Descripción
                        </label>
                        <textarea name="description" id="description" rows="3" required
                            class="resize-none border border-gray-300 dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 transition">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-800 text-white font-semibold py-2 rounded-lg shadow-md transition">
                        Crear Ciudad
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
