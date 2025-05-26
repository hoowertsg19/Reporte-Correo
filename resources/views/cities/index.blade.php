<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-900 dark:text-gray-100 leading-tight">
                {{ __('Ciudades') }}
            </h2>
            <a href="{{ route('cities.create') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-md shadow hover:shadow-lg transition">
                + Nueva Ciudad
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-blue-50 via-white to-blue-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen">
        <div class="max-w-5xl mx-auto px-4">
            <div class="mb-6 flex items-center justify-between">
                <span class="text-base font-medium text-gray-700 dark:text-gray-300">
                    Total de registros: <span class="font-bold text-blue-600 dark:text-blue-400">{{ $count }}</span>
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($cities as $city)
                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl shadow-2xl hover:shadow-2xl transition-shadow duration-300 border border-gray-100 dark:border-gray-700 overflow-hidden group min-h-[320px] p-2">
                        <!-- Decorative top bar -->
                        
                        <div class="p-8 flex flex-col h-full">
                            <div class="flex items-center mb-5">
                                <div class="w-14 h-14 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center mr-4">
                                    <svg class="w-8 h-8 text-blue-500 dark:text-blue-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 21v-4a2 2 0 012-2h3m10 6v-4a2 2 0 00-2-2h-3m-4 0V5a2 2 0 012-2h4a2 2 0 012 2v10m-8 0h8"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $city->name }}</h3>
                            </div>
                            <p class="text-base text-gray-600 dark:text-gray-400 mb-8 flex-1">{{ $city->description }}</p>
                            <div class="flex justify-end space-x-3 mt-auto">
                                <a href="{{ route('cities.edit', $city->id) }}" class="px-4 py-2 rounded bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 font-medium hover:bg-blue-200 dark:hover:bg-blue-800 transition">
                                    Editar
                                </a>
                                <button 
                                    type="button" 
                                    class="px-4 py-2 rounded bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 font-medium hover:bg-red-200 dark:hover:bg-red-800 transition"
                                    onclick="openModal({{ $city->id }})">
                                    Eliminar
                                </button>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div id="modal-{{ $city->id }}" class="fixed inset-0 z-50 hidden bg-black bg-opacity-40 flex items-center justify-center">
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6 w-full max-w-xs">
                                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">¿Eliminar ciudad?</h2>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-5">¿Estás seguro que deseas eliminar esta ciudad?</p>
                                <div class="flex justify-end space-x-2">
                                    <button 
                                        type="button" 
                                        class="px-4 py-2 rounded bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 transition"
                                        onclick="closeModal({{ $city->id }})">
                                        Cancelar
                                    </button>
                                    <form action="{{ route('cities.destroy', $city->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit" 
                                            class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700 transition">
                                            Confirmar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Scripts -->
                        <script>
                            function openModal(id) {
                                document.getElementById(`modal-${id}`).classList.remove('hidden');
                            }
                            function closeModal(id) {
                                document.getElementById(`modal-${id}`).classList.add('hidden');
                            }
                        </script>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $cities->links() }}
            </div>
        </div>
    </div>

    @if(session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: "{{ session('success') }}",
                    confirmButtonText: 'Aceptar',
                    customClass: { popup: 'rounded-xl' }
                });
            });
        </script>
    @endif

    @if(session('error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Advertencia',
                    text: "{{ session('error') }}",
                    confirmButtonText: 'Aceptar',
                    customClass: {
                        popup: 'rounded-xl'
                    }
                });
            });
        </script>
    @endif
</x-app-layout>
