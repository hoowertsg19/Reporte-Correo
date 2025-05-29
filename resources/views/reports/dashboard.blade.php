{{-- filepath: resources/views/reports/dashboard.blade.php --}}
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
      Dashboard de Reportes
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      {{-- Card de acción para enviar reportes --}}
      <div class="flex justify-center mb-10">
        <div class="bg-gradient-to-br from-blue-800 to-blue-600 shadow-xl rounded-xl p-8 w-full max-w-md flex flex-col items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0a4 4 0 11-8 0 4 4 0 018 0zm-8 0V8a4 4 0 018 0v4" />
          </svg>
          <h3 class="text-2xl font-bold text-white mb-2">Opciones de Reporte</h3>
          <p class="text-blue-100 mb-6 text-center">Recibe el reporte de ciudadanos y ciudades en tu correo electrónico, con o sin PDF adjunto.</p>
          <div class="flex flex-col gap-3 w-full">
            {{-- Botón: Enviar reporte por correo (sin PDF) --}}
            <form action="{{ route('report.send.basic') }}" method="POST" class="w-full flex justify-center">
              @csrf
              <button
                type="submit"
                class="bg-blue-400 hover:bg-blue-500 text-white font-semibold px-6 py-2 rounded-full shadow transition flex items-center gap-2 w-full justify-center"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0a4 4 0 11-8 0 4 4 0 018 0zm-8 0V8a4 4 0 018 0v4" />
                </svg>
                Enviar reporte por correo
              </button>
            </form>
            {{-- Botón: Enviar reporte PDF por correo --}}
            <form action="{{ route('report.send') }}" method="POST" class="w-full flex justify-center">
              @csrf
              <button
                type="submit"
                class="bg-white text-blue-800 font-semibold px-6 py-2 rounded-full shadow hover:bg-blue-100 transition flex items-center gap-2 w-full justify-center"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11V7m0 0V7m0 0a4 4 0 100 8 4 4 0 000-8zm0 8v4m0 0h4m-4 0H8" />
                </svg>
                Enviar reporte PDF por correo
              </button>
            </form>
          </div>
        </div>
      </div>

      {{-- Notificación SweetAlert --}}
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      @if(session('success'))
      <script>
        document.addEventListener('DOMContentLoaded', () => {
          Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: "{{ session('success') }}",
            confirmButtonText: 'Aceptar',
            customClass: { popup: 'rounded-xl' }
          }).then(() => {
            // Limpia el mensaje de sesión usando fetch a una ruta temporal
            fetch("{{ route('report.clear.success') }}");
          });
        });
      </script>
      @endif

    </div>
  </div>
</x-app-layout>