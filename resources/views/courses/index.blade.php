{{-- resources/views/courses/index.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Relyzn Course') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- # Slideshow / Hero Section --}}
            <div class="bg-white rounded-lg shadow mb-10 p-6">
                <div class="w-full h-60 bg-gray-300 flex items-center justify-center text-gray-600 text-xl">
                    # Gambar Slide Show
                </div>
            </div>

            {{-- Section Title --}}
            <h3 class="text-2xl font-bold mb-6">Kursus Populer</h3>

            {{-- List of Courses --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($courses as $course)
                    <div class="bg-white rounded shadow p-4 hover:shadow-md">
                        <div class="h-40 bg-gray-200 flex items-center justify-center mb-3">
                            # Gambar Kursus
                        </div>
                        <h4 class="text-lg font-semibold">{{ $course->title }}</h4>
                        <p class="text-sm text-gray-600">Level: {{ $course->level }}</p>
                        <p class="mt-2 font-bold">Rp {{ number_format($course->price, 0, ',', '.') }}</p>

                        <a href="{{ route('courses.show', $course->id) }}"
                           class="inline-block mt-3 bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                            Lihat Detail
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
