{{-- filepath: resources/views/reports/dashboard.blade.php --}}
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
      Dashboard de Reportes
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      {{-- Cards --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
          <h3 class="text-lg font-semibold">Total de ciudades</h3>
          <p class="text-3xl mt-2">{{ $totalCities }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
          <h3 class="text-lg font-semibold">Total de ciudadanos</h3>
          <p class="text-3xl mt-2">{{ $totalCitizens }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
          <h3 class="text-lg font-semibold mb-2">Ciudadanos por ciudad</h3>
          <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($citiesWithCitizens as $city)
              <li class="py-2 flex justify-between">
                <span>{{ $city->name }}</span>
                <span class="font-bold">{{ $city->citizens_count }}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>

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