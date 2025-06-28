{{-- resources/views/dashboard/admin.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-bold">Statistik</h3>
            <ul class="mt-4 space-y-2">
                <li>Total Kursus: {{ $totalCourses }}</li>
                <li>Total Transaksi Berhasil: {{ $totalTransactions }}</li>
                <li>Total Pemasukan: Rp {{ number_format($totalIncome, 0, ',', '.') }}</li>
            </ul>
        </div>
    </div>
</x-app-layout>
