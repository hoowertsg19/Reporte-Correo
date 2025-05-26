<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white dark:text-white leading-tight tracking-tight">
            <!-- Puedes poner un título aquí si lo deseas -->
        </h2>
    </x-slot>

    <div class="py-16 min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 dark:from-gray-950 dark:via-gray-900 dark:to-gray-950">
        <div class="max-w-5xl mx-auto px-4 sm:px-8">
            <h2 class="text-4xl font-extrabold mb-12 text-white tracking-tight text-center drop-shadow-lg">
                Dashboard de Ciudadanos
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-12">
                <!-- Total de ciudades -->
                <div class="bg-gray-100 dark:bg-gray-800 p-10 rounded-3xl shadow-2xl flex flex-col items-center transition-transform duration-300 hover:-translate-y-2 hover:scale-105">
                    <h3 class="text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-widest mb-3">Total de ciudades</h3>
                    <p class="text-6xl font-black text-gray-900 dark:text-white mb-2 drop-shadow-xl">{{ $totalCities }}</p>
                    <div class="w-16 h-1 bg-blue-400 dark:bg-blue-700 rounded-full mt-2"></div>
                </div>

                <!-- Total de ciudadanos -->
                <div class="bg-gray-100 dark:bg-gray-800 p-10 rounded-3xl shadow-2xl flex flex-col items-center transition-transform duration-300 hover:-translate-y-2 hover:scale-105">
                    <h3 class="text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-widest mb-3">Total de ciudadanos</h3>
                    <p class="text-6xl font-black text-gray-900 dark:text-white mb-2 drop-shadow-xl">{{ $totalCitizens }}</p>
                    <div class="w-16 h-1 bg-purple-400 dark:bg-purple-700 rounded-full mt-2"></div>
                </div>

                <!-- Ciudadanos por ciudad con buscador -->
                <div 
                    x-data="{
                        search: '',
                        cities: {{ $citiesWithCitizens->map(fn($c) => ['name' => ucfirst($c->name), 'citizens' => $c->citizens_count])->sortBy('name')->values()->toJson() }},
                        get filteredCities() {
                            if (this.search === '') return this.cities;
                            return this.cities.filter(c => c.name.toLowerCase().includes(this.search.toLowerCase()));
                        }
                    }"
                    class="bg-gray-100 dark:bg-gray-800 p-10 rounded-3xl shadow-2xl flex flex-col items-center w-full transition-transform duration-300 hover:-translate-y-2 hover:scale-105"
                >
                    <h3 class="text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-widest mb-4 text-center">Ciudadanos por ciudad</h3>

                    <!-- Buscador -->
                    <input 
                        type="text" 
                        x-model="search"
                        placeholder="Buscar ciudad..."
                        class="w-full px-4 py-2 border-none rounded-lg mb-5 text-base bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-inner"
                    />

                    <!-- Lista con scroll -->
                    <ul class="w-full max-h-56 overflow-y-auto divide-y divide-gray-300 dark:divide-gray-700 custom-scrollbar bg-transparent">
                        <template x-for="city in filteredCities" :key="city.name">
                            <li class="py-3 flex justify-between items-center text-lg text-gray-900 dark:text-white">
                                <span class="font-semibold" x-text="city.name"></span>
                                <span class="font-bold text-blue-600 dark:text-blue-400" x-text="city.citizens"></span>
                            </li>
                        </template>
                        <template x-if="filteredCities.length === 0">
                            <li class="py-3 text-center text-gray-400 dark:text-gray-500">No se encontraron ciudades</li>
                        </template>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #6366f1;
            border-radius: 8px;
            border: 2px solid #1e293b;
        }
        .dark .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #818cf8;
            border: 2px solid #0f172a;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #4f46e5;
        }
        .dark .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #6366f1;
        }
        .custom-scrollbar {
            scrollbar-color: #6366f1 #1e293b;
            scrollbar-width: thin;
        }
        .dark .custom-scrollbar {
            scrollbar-color: #818cf8 #0f172a;
        }
    </style>
</x-app-layout>
