{{-- resources/views/courses/index.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-400 leading-tight">
            {{ __('Relyzn Course') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-900 min-h-screen text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Hero / Slideshow --}}
            <div class="bg-gray-800 rounded-lg shadow mb-10 p-6">
                <div class="w-full h-60 bg-gray-700 flex items-center justify-center text-gray-400 text-xl">
                    # Gambar Slide Show
                </div>
            </div>

            {{-- Section Title --}}
          <h3 class="text-2xl font-bold mb-6 text-purple-400">Kursus Populer</h3>

            {{-- Course Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($courses as $course)
                    <div class="bg-gray-800 rounded shadow p-4 hover:shadow-lg transition">
                        <div class="h-40 bg-gray-600 flex items-center justify-center mb-3 text-gray-300">
                            # Gambar Kursus
                        </div>
                        <h4 class="text-lg font-semibold text-indigo-300">{{ $course->title }}</h4>
                        <p class="text-sm text-gray-400">Level: {{ $course->level }}</p>
                        <p class="mt-2 font-bold text-gray-100">Rp {{ number_format($course->price, 0, ',', '.') }}</p>

                        <a href="{{ route('courses.show', $course->id) }}"
                           class="inline-block mt-3 bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                            Lihat Detail
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
