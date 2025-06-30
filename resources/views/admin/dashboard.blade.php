{{-- resources/views/dashboard/admin.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Statistik Kursus</h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div class="bg-indigo-100 border-l-4 border-indigo-500 text-indigo-700 p-4">
                        <p class="text-sm font-medium">Total Kursus</p>
                        <p class="text-xl font-bold">{{ $totalCourses }}</p>
                    </div>

                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4">
                        <p class="text-sm font-medium">Total Transaksi Sukses</p>
                        <p class="text-xl font-bold">{{ $totalTransactions }}</p>
                    </div>

                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4">
                        <p class="text-sm font-medium">Total Pemasukan</p>
                        <p class="text-xl font-bold">Rp {{ number_format($totalIncome, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
