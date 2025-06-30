{{-- resources/views/dashboard/user.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard Saya') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-900 text-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="mb-4 p-4 bg-green-800 border border-green-600 text-green-100 rounded">
                    {{ session('message') }}
                </div>
            @endif

            <div class="bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Kursus yang Kamu Ikuti</h3>

                @if ($transactions->isEmpty())
                    <p class="text-gray-300">Kamu belum mendaftar kursus apa pun.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach ($transactions as $transaction)
                            <div class="border border-gray-600 rounded-lg p-4 bg-gray-700 shadow hover:shadow-md transition">
                                <div class="h-40 bg-gray-600 flex items-center justify-center mb-3 text-gray-300">
                                    # Gambar Kursus
                                </div>
                                <h4 class="text-lg font-semibold text-indigo-300">{{ $transaction->course->title }}</h4>
                                <p class="text-sm text-gray-400">Level: {{ $transaction->course->level }}</p>
                                <p class="text-sm mt-2 text-gray-300">Tanggal Bayar: {{ $transaction->payment_date->format('d M Y') }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
