<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-700 leading-tight">
            Laporan Transaksi
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Flash Message --}}
            @if (session('message'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded shadow">
                    {{ session('message') }}
                </div>
            @endif

            {{-- Table Card --}}
            <div class="bg-white shadow rounded-lg p-6 overflow-x-auto">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">Daftar Transaksi Berhasil</h3>

                @if ($transactions->isEmpty())
                    <p class="text-gray-600 text-sm">Belum ada transaksi yang berhasil.</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left">#</th>
                                <th class="px-4 py-2 text-left">Nama User</th>
                                <th class="px-4 py-2 text-left">Kursus</th>
                                <th class="px-4 py-2 text-left">Tanggal</th>
                                <th class="px-4 py-2 text-left">Harga</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($transactions as $index => $trx)
                                <tr>
                                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2">{{ $trx->user->name ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $trx->course->title ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($trx->payment_date)->format('d M Y') }}</td>
                                    <td class="px-4 py-2 font-medium text-green-600">Rp {{ number_format($trx->course->price ?? 0, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
