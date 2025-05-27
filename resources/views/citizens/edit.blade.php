<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Editar Ciudadano') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-lg mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 shadow-lg dark:shadow-xl rounded-xl p-8 border border-gray-100 dark:border-gray-700">
                <form action="{{ route('citizens.update', $citizen->id) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')

                    <div class="mb-5">
                        <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                            Nombre
                        </label>
                        <input type="text" name="first_name" id="first_name"
                            value="{{ old('first_name', $citizen->first_name) }}"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm transition">
                        @error('first_name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                            Apellido
                        </label>
                        <input type="text" name="last_name" id="last_name"
                            value="{{ old('last_name', $citizen->last_name) }}"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm transition">
                        @error('last_name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                            Género
                        </label>
                        <select name="gender" id="gender"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm transition">
                            <option value="">Selecciona género</option>
                            <option value="MASCULINO" {{ old('gender', $citizen->gender) == 'MASCULINO' ? 'selected' : '' }}>Masculino</option>
                            <option value="FEMENINO" {{ old('gender', $citizen->gender) == 'FEMENINO' ? 'selected' : '' }}>Femenino</option>
                        </select>
                        @error('gender')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="birth_date" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                            Fecha de nacimiento
                        </label>
                        <input type="date" name="birth_date" id="birth_date"
                            value="{{ old('birth_date', $citizen->birth_date) }}"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm transition">
                        @error('birth_date')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="city_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                            Ciudad
                        </label>
                        <select name="city_id" id="city_id"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm transition">
                            <option value="">Selecciona ciudad</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" {{ old('city_id', $citizen->city_id) == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-bold rounded-lg shadow-md transition focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Actualizar Ciudadano
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>