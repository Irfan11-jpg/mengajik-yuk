<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
            {{ __('Dashboard Utama Guru - MengajiYuk') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-amber-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-800 mb-2">Selamat Datang, Ustadz/Ustadzah {{ Auth::user()->name }}!</h3>
                    <p class="text-sm text-gray-500 mb-6">Berikut adalah rangkuman perkembangan hafalan seluruh santri online Anda.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-emerald-50 p-6 rounded-xl border border-emerald-100">
                            <span class="text-xs font-semibold text-emerald-700 uppercase tracking-wider">Total Santri Aktif</span>
                            <div class="text-3xl font-bold text-emerald-900 mt-1">24</div>
                        </div>
                        <div class="bg-amber-50 p-6 rounded-xl border border-amber-100">
                            <span class="text-xs font-semibold text-amber-700 uppercase tracking-wider">Setoran Belum Dinilai</span>
                            <div class="text-3xl font-bold text-amber-900 mt-1">8 Belum</div>
                        </div>
                        <div class="bg-blue-50 p-6 rounded-xl border border-blue-100">
                            <span class="text-xs font-semibold text-blue-700 uppercase tracking-wider">Rata-rata Hafalan Surah</span>
                            <div class="text-3xl font-bold text-blue-900 mt-1">12 Surah</div>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h4 class="text-md font-semibold text-gray-700 mb-4 text-center">Grafik Pertumbuhan Total Setoran Ayat Santri (Bulanan)</h4>
                        <div class="relative w-full aspect-[2/1] max-h-[350px]">
                            <canvas id="guruProgressChart"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('guruProgressChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chartData['labels']),
                datasets: [{
                    label: 'Jumlah Ayat Disetor',
                    data: @json($chartData['data']),
                    backgroundColor: 'rgba(16, 185, 129, 0.6)',
                    borderColor: 'rgba(16, 185, 129, 1)',
                    borderWidth: 1.5,
                    borderRadius: 6
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