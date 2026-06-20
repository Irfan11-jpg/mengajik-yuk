<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
            {{ __('Jurnal Ibadah & Hafalan Santri - MengajiYuk') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-amber-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-800 mb-2">Assalamu'alaikum, {{ Auth::user()->name }}!</h3>
                    <p class="text-sm text-gray-500 mb-6">Tetap semangat menjaga hafalan Al-Qur'an kamu ya. Semangat berkontribusi!</p>

                    <div class="bg-amber-50 border border-amber-200 text-amber-900 px-4 py-3 rounded-xl text-sm mb-8">
                        <strong>Info Halaman Kolaborasi:</strong> 
                        <ul class="list-disc pl-5 mt-1">
                            <li>Halaman Baca Al-Qur'an (Quran Reader) akan muncul di sini setelah diintegrasikan oleh <strong>Mhs 2</strong>.</li>
                            <li>Formulir Input Setoran hafalan baru untuk dinilai guru akan disisipkan di sini oleh <strong>Mhs 3</strong>.</li>
                        </ul>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h4 class="text-md font-semibold text-gray-700 mb-4 text-center">Grafik Capaian Jumlah Ayat Terhafal Per Surah</h4>
                        <div class="relative w-full aspect-[2/1] max-h-[350px]">
                            <canvas id="santriProgressChart"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('santriProgressChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($chartData['labels']),
                datasets: [{
                    label: 'Jumlah Ayat Terhafal',
                    data: @json($chartData['data']),
                    fill: true,
                    backgroundColor: 'rgba(245, 158, 11, 0.1)',
                    borderColor: 'rgba(245, 158, 11, 1)',
                    borderWidth: 2.5,
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(16, 185, 129, 1)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0, 0, 0, 0.05)' }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });
    </script>
</x-app-layout>