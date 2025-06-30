<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-700 leading-tight">
            Detail Kursus
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Flash Message --}}
            @if (session('message'))
                <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded shadow">
                    {{ session('message') }}
                </div>
            @endif

            {{-- Card Detail --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="h-64 bg-gray-100 flex items-center justify-center">
                    @if ($course->thumbnail)
                        <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}" class="object-cover h-full w-full">
                    @else
                        <span class="text-indigo-400"># Gambar Kursus</span>
                    @endif
                </div>
                <div class="p-6 space-y-4">
                    <h3 class="text-2xl font-bold text-indigo-700">{{ $course->title }}</h3>

                    {{-- Badge Level --}}
                    <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                        {{ $course->level === 'Pemula' ? 'bg-green-100 text-green-600' :
                           ($course->level === 'Menengah' ? 'bg-yellow-100 text-yellow-600' : 'bg-red-100 text-red-600') }}">
                        {{ $course->level }}
                    </span>

                    <p class="text-gray-700 leading-relaxed">{{ $course->description }}</p>

                    <p class="text-xl font-bold text-indigo-700">Rp {{ number_format($course->price, 0, ',', '.') }}</p>

                    {{-- Logic Checkout --}}
                    <div class="mt-6">
                        @auth
                            @if ($alreadyBought)
                                <div class="text-green-600 font-semibold">✅ Kamu sudah membeli kursus ini.</div>
                            @else
                                <form action="{{ route('checkout', $course->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-purple-50 font-semibold py-2 px-4 rounded-lg shadow-md hover:from-indigo-600 hover:to-purple-700 transition duration-300 ease-in-out">
                                        🛒 Beli Sekarang
                                    </button>
                                </form>
                            @endif
                        @else
                            <p class="text-sm text-gray-600">
                                Silakan
                                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline font-medium">login</a>
                                untuk membeli kursus ini.
                            </p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
