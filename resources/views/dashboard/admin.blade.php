{{-- resources/views/dashboard/admin.blade.php --}}

<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-900 min-h-screen text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Judul --}}
            <div class="mb-8">
                <h3 class="text-3xl font-bold text-purple-300">📊 Statistik Kursus</h3>
                <p class="text-sm text-gray-400 mt-1">Ringkasan data aktivitas platform.</p>
            </div>

            {{-- Statistik Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div
                    class="bg-gradient-to-br from-indigo-700 to-purple-700 rounded-xl shadow-lg p-6 border border-indigo-500">
                    <p class="text-sm uppercase text-gray-300 font-semibold mb-1">Total Kursus</p>
                    <p class="text-3xl font-bold text-white">{{ $totalCourses }}</p>
                </div>
                <div
                    class="bg-gradient-to-br from-green-600 to-emerald-500 rounded-xl shadow-lg p-6 border border-green-400">
                    <p class="text-sm uppercase text-gray-300 font-semibold mb-1">Transaksi Sukses</p>
                    <p class="text-3xl font-bold text-white">{{ $totalTransactions }}</p>
                </div>
                <div
                    class="bg-gradient-to-br from-yellow-500 to-amber-400 rounded-xl shadow-lg p-6 border border-yellow-300">
                    <p class="text-sm uppercase text-gray-900 font-semibold mb-1">Total Pemasukan</p>
                    <p class="text-3xl font-bold text-black">Rp {{ number_format($totalIncome, 0, ',', '.') }}</p>
                </div>
            </div>

            {{-- Chart Transaksi --}}
            {{-- Chart Section --}}
            <div class="mt-16 bg-gray-800 p-6 rounded-xl shadow-lg">
                <h4 class="text-xl font-semibold text-white mb-4">📈 Grafik Transaksi Bulanan</h4>
                <canvas id="salesChart" height="120"></canvas>
            </div>

            {{-- Kursus Terbaru --}}
            <div class="mt-12 bg-gray-800 rounded-xl p-6 shadow">
                <h4 class="text-lg font-semibold text-purple-200 mb-4">🆕 Kursus Terbaru</h4>
                <ul class="text-sm divide-y divide-gray-700">
                    @foreach (\App\Models\Course::latest()->take(5)->get() as $course)
                        <li class="py-2 flex justify-between">
                            <span class="text-indigo-300">{{ $course->title }}</span>
                            <span class="text-gray-400 text-xs">{{ $course->created_at->diffForHumans() }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Tips atau Prediksi --}}
            <div class="mt-12 bg-gradient-to-r from-purple-700 to-pink-600 rounded-xl p-6 shadow text-white">
                <h4 class="text-lg font-bold mb-2">🔮 Potensi Masa Depan</h4>
                <p class="text-sm">Platform kamu berpotensi mendapatkan <span
                        class="font-bold text-yellow-300">peningkatan 35%</span> transaksi jika menambahkan kursus
                    tingkat lanjut dan promosi rutin setiap bulan.</p>
            </div>

            {{-- Last updated --}}
            <div class="mt-12 text-sm text-gray-400">
                Diperbarui terakhir: {{ now()->translatedFormat('d F Y H:i') }}
            </div>

        </div>
    </div>

    {{-- ChartJS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // const ctx = document.getElementById('salesChart').getContext('2d');
        // const salesChart = new Chart(ctx, {
        //     type: 'line',
        //     data: {
        //         labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        //         datasets: [{
        //             label: 'Pemasukan Bulanan',
        //             data: [120000, 180000, 220000, 150000, 300000, 270000],
        //             backgroundColor: 'rgba(139, 92, 246, 0.2)',
        //             borderColor: 'rgba(139, 92, 246, 1)',
        //             borderWidth: 2,
        //             tension: 0.3
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         scales: {
        //             y: {
        //                 beginAtZero: true,
        //                 ticks: {
        //                     callback: value => 'Rp ' + value.toLocaleString()
        //                 }
        //             }
        //         }
        //     }
        // });

        fetch("{{ route('admin.statistics.data') }}")
        .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById('salesChart').getContext('2d');
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            const salesData = new Array(12).fill(0);

            data.monthlySales.forEach(item => {
                const index = parseInt(item.month) - 1;
                salesData[index] = item.total;
            });

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Transaksi',
                        data: salesData,
                        backgroundColor: 'rgba(99, 102, 241, 0.8)', // indigo-500
                        borderRadius: 6,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        });
    </script>
</x-admin-layout>
