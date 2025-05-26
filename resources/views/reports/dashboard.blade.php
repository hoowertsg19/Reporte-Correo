{{-- filepath: resources/views/reports/dashboard.blade.php --}}
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      {{-- Botón de envío --}}
      <form id="report-form" action="{{ route('report.send') }}" method="POST">
        @csrf
        <button
          type="submit"
          id="send-report-btn"
          class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
        >
          Enviar reporte por correo
        </button>
      </form>

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
          });
        });
      </script>
      @endif

    </div>
  </div>
</x-app-layout>