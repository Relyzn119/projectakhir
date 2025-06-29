{{-- resources/views/courses/show.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kursus') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">

                {{-- # Gambar Kursus --}}
                <div class="w-full h-60 bg-gray-200 flex items-center justify-center text-gray-500 mb-6">
                    # Gambar Kursus
                </div>

                <h1 class="text-3xl font-bold mb-2">{{ $course->title }}</h1>
                <p class="text-gray-700 text-sm mb-1">Level: {{ $course->level }}</p>
                <p class="text-xl text-indigo-600 font-semibold mb-4">Rp {{ number_format($course->price, 0, ',', '.') }}</p>

                <p class="text-gray-800 leading-relaxed mb-6">
                    {{ $course->description }}
                </p>

                <form action="{{ route('checkout', $course->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded">
                        Daftar Kursus Ini
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
