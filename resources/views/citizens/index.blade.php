<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 tracking-tight">
                {{ __('Listado de Ciudadanos') }}
            </h2>
            <a href="{{ route('citizens.create') }}" class="inline-block px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition font-medium">
                + Nuevo Ciudadano
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-900 shadow-2xl rounded-xl p-6">
                <div class="space-y-4">

                    <!-- Barra de búsqueda -->
                    <form method="GET" action="{{ route('citizens.index') }}" class="mb-6">
                        <input
                            type="text"
                            name="search"
                            value="{{ $search ?? '' }}"
                            placeholder="Buscar por nombre o ciudad..."
                            class="w-full md:w-1/2 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white"
                        >
                    </form>

                    @forelse($citizens as $citizen)
                        <div class="flex flex-col md:flex-row md:items-center justify-between bg-gray-50 dark:bg-gray-800 rounded-lg p-4 shadow-md hover:shadow-xl transition border border-gray-100 dark:border-gray-700">
                            <div class="flex-1">
                                <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $citizen->getFullName() }}</div>
                                <div class="text-sm text-blue-700 dark:text-blue-300">{{ $citizen->getCity() }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">Fecha de nacimiento: <span class="font-medium">{{ $citizen->birth_date }}</span></div>
                            </div>
                            <div class="flex mt-4 md:mt-0 space-x-2">
                                <a href="{{ route('citizens.show', $citizen->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 shadow transition text-sm">Ver</a>
                                <a href="{{ route('citizens.edit', $citizen->id) }}" class="px-3 py-1 bg-yellow-400 text-gray-900 rounded hover:bg-yellow-500 shadow transition text-sm">Editar</a>
                                <button type="button" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 shadow transition text-sm" onclick="openModal('modal-{{ $citizen->id }}')">
                                    Eliminar
                                </button>

                                <!-- Modal -->
                                <div id="modal-{{ $citizen->id }}" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40 hidden">
                                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl p-6 w-full max-w-sm border border-gray-200 dark:border-gray-700">
                                        <h3 class="text-lg font-bold mb-3 text-gray-800 dark:text-gray-100">¿Eliminar ciudadano?</h3>
                                        <p class="mb-6 text-gray-600 dark:text-gray-300">¿Está seguro que desea eliminar este ciudadano? Esta acción no se puede deshacer.</p>
                                        <div class="flex justify-end space-x-2">
                                            <button type="button" onclick="closeModal('modal-{{ $citizen->id }}')" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded hover:bg-gray-300 dark:hover:bg-gray-600 transition">Cancelar</button>
                                            <form action="{{ route('citizens.destroy', $citizen->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function openModal(id) {
                                document.getElementById(id).classList.remove('hidden');
                            }
                            function closeModal(id) {
                                document.getElementById(id).classList.add('hidden');
                            }
                        </script>
                    @empty
                        <div class="text-center text-gray-500 dark:text-gray-400 py-10">
                            No hay ciudadanos registrados.
                        </div>
                    @endforelse
                </div>

                <div class="mt-8">
                    {{ $citizens->appends(['search' => $search])->links() }}
                </div>
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
                customClass: {
                    popup: 'rounded-xl'
                }
            });
        });
    </script>
    @endif

    @if(session('error'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
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
