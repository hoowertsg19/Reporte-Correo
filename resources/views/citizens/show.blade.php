<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 dark:text-gray-100 leading-tight tracking-wide">
            {{ __('Detalles del Ciudadano') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors">
        <div class="max-w-xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg dark:shadow-2xl border border-gray-200 dark:border-gray-700 p-7 transition-all">
                <h3 class="text-xl font-bold mb-5 text-blue-700 dark:text-blue-300 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-500 dark:text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    {{ __('Información del Ciudadano') }}
                </h3>
                <div class="space-y-3 text-gray-800 dark:text-gray-200">
                    <div>
                        <span class="font-semibold">{{ __('Nombre completo:') }}</span>
                        <span>{{ $citizen->getFullName() }}</span>
                    </div>
                    <div>
                        <span class="font-semibold">{{ __('Ciudad:') }}</span>
                        <span>{{ $citizen->getCity() }}</span>
                    </div>
                    <div>
                        <span class="font-semibold">{{ __('Fecha de nacimiento:') }}</span>
                        <span>{{ $citizen->birth_date }}</span>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mt-7">
                    <a href="{{ route('citizens.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-700 text-white rounded-md shadow-sm hover:bg-blue-700 dark:hover:bg-blue-800 transition font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        {{ __('Volver') }}
                    </a>
                    <a href="{{ route('citizens.edit', $citizen->id) }}"
                        class="inline-flex items-center px-4 py-2 bg-yellow-500 dark:bg-yellow-600 text-white rounded-md shadow-sm hover:bg-yellow-600 dark:hover:bg-yellow-700 transition font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536M9 11l6 6M3 21h6l11-11a2.828 2.828 0 00-4-4L5 17v4z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        {{ __('Editar') }}
                    </a>
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-700 text-white rounded-md shadow-sm hover:bg-red-700 dark:hover:bg-red-800 transition font-medium"
                        onclick="openModal('modal-{{ $citizen->id }}')">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        {{ __('Eliminar') }}
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="modal-{{ $citizen->id }}"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40 hidden transition-all">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl p-7 w-full max-w-sm border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-bold mb-3 text-red-600 dark:text-red-400 flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-500 dark:text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 9v2m0 4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    {{ __('Confirmar eliminación') }}
                </h3>
                <p class="mb-5 text-gray-700 dark:text-gray-200">{{ __('¿Estás seguro que deseas eliminar este ciudadano?') }}</p>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal('modal-{{ $citizen->id }}')"
                        class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 transition font-medium">
                        {{ __('Cancelar') }}
                    </button>
                    <form action="{{ route('citizens.destroy', $citizen->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 dark:bg-red-700 text-white rounded-md hover:bg-red-700 dark:hover:bg-red-800 transition font-medium">
                            {{ __('Eliminar') }}
                        </button>
                    </form>
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
    </div>
</x-app-layout>
