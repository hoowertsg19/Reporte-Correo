<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 tracking-tight">
                Crear Ciudadano
            </h2>
            <a href="{{ route('citizens.index') }}"
                class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded-lg shadow hover:bg-gray-300 dark:hover:bg-gray-600 transition font-medium">
                Volver a la Lista
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-lg mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg dark:shadow-2xl p-8">
                <form action="{{ route('citizens.store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="mb-5">
                        <label for="first_name" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                            Nombre
                        </label>
                        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition shadow-sm"
                            placeholder="Ingresa el nombre">
                        @error('first_name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="last_name" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                            Apellido
                        </label>
                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition shadow-sm"
                            placeholder="Ingresa el apellido">
                        @error('last_name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="gender" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                            Género
                        </label>
                        <select name="gender" id="gender"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition shadow-sm">
                            <option value="">Seleccionar género</option>
                            <option value="MASCULINO" {{ old('gender') == 'MASCULINO' ? 'selected' : '' }}>Masculino</option>
                            <option value="FEMENINO" {{ old('gender') == 'FEMENINO' ? 'selected' : '' }}>Femenino</option>
                        </select>
                        @error('gender')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="birth_date" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                            Fecha de Nacimiento
                        </label>
                        <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition shadow-sm">
                        @error('birth_date')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-7">
                        <label for="city_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                            Ciudad
                        </label>
                        <select name="city_id" id="city_id"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition shadow-sm">
                            <option value="">Seleccionar ciudad</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-md hover:shadow-lg transition text-base uppercase tracking-wide">
                        Crear Ciudadano
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
