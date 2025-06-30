<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-400 leading-tight">
            {{ __('Kontak Kami') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-white min-h-screen">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-gray-800 p-8 rounded shadow">
                <h3 class="text-2xl font-bold mb-4 text-purple-400">Hubungi Kami</h3>
                <p class="text-gray-300 mb-6">
                    Punya pertanyaan, saran, atau butuh bantuan? Jangan ragu untuk menghubungi tim kami melalui form di bawah atau lewat kontak resmi kami.
                </p>

                <form action="#" method="POST" class="space-y-4">
                    <div>
                        <label class="block text-sm mb-1 text-gray-200">Nama</label>
                        <input type="text" class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Nama kamu..." required>
                    </div>

                    <div>
                        <label class="block text-sm mb-1 text-gray-200">Email</label>
                        <input type="email" class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Email aktif..." required>
                    </div>

                    <div>
                        <label class="block text-sm mb-1 text-gray-200">Pesan</label>
                        <textarea rows="4" class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Tulis pesanmu di sini..." required></textarea>
                    </div>

                    <button type="submit" class="px-6 py-2 bg-purple-500 text-white rounded hover:bg-purple-600 transition">
                        Kirim Pesan
                    </button>
                </form>

                <div class="mt-10 text-gray-400 text-sm">
                    <p>Email: support@relyzncourse.com</p>
                    <p>WhatsApp: +62 812-3456-7890</p>
                    <p>Alamat: Jl. Belajar Coding No. 123, Medan, Indonesia</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
