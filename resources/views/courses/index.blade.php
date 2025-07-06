<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-700 leading-tight">
            {{ __('Relyzn Course') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-gray-50 to-indigo-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Hero / Slideshow --}}
            <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 rounded-2xl shadow-2xl mb-12 p-8 relative overflow-hidden">
                <div class="absolute inset-0 bg-black bg-opacity-30"></div>
                <div class="relative z-10">
                   <div
    x-data="{ current: 0, slides: [
        '{{ asset('images/slideshow/DATA.png') }}',
        '{{ asset('images/slideshow/KOTLIN.png') }}',
        '{{ asset('images/slideshow/PHP.jpg') }}',
        '{{ asset('images/slideshow/PYTHON.png') }}'
        
        
    ] }"
    x-init="setInterval(() => { current = (current + 1) % slides.length }, 4000)"
    class="relative w-full h-64 bg-white bg-opacity-10 rounded-xl flex items-center justify-center text-white text-2xl font-bold backdrop-blur-sm border border-white border-opacity-30 overflow-hidden"
>
    {{-- Slideshow Image --}}
    <template x-for="(slide, index) in slides" :key="index">
        <img
            x-show="current === index"
            x-transition:enter="transition-opacity duration-700"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            :src="slide"
            class="absolute inset-0 w-full h-full object-cover rounded-xl opacity-70"
        >
    </template>

    {{-- Overlay Content --}}
    <div class="relative z-10 text-center bg-black bg-opacity-40 p-6 rounded-lg">
        <div class="text-4xl mb-2"></div>
        <div class="text-2xl font-bold mb-2">Selamat Datang di Relyzn Course</div>
        <p class="text-sm opacity-90">Temukan kursus terbaik untuk masa depan Anda</p>
         <div class="text-4xl mb-2"></div>
    </div>
</div>

                        {{-- Overlay Content --}}
                        <div class="relative z-10 text-center bg-black bg-opacity-40 p-6 rounded-lg">
                            <div class="text-4xl mb-2">🎓</div>
                            <div class="text-2xl font-bold mb-2">Selamat Datang di Relyzn Course</div>
                            <p class="text-sm opacity-90">Temukan kursus terbaik untuk masa depan Anda</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section Title --}}
            <div class="text-center mb-10">
                <h3 class="text-3xl font-bold text-indigo-800 mb-2">Kursus Populer</h3>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full"></div>
                <p class="text-gray-600 mt-4">Pilih kursus yang sesuai dengan kebutuhan Anda</p>
            </div>

            {{-- Course Cards - Format Horizontal --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach ($courses as $course)
                    <div class="group bg-white border-2 border-gray-100 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-1 hover:scale-[1.02] overflow-hidden">
                        <div class="flex h-48">
                            {{-- Thumbnail Section (Left Side) --}}
                            <div class="w-1/4 p-4 flex-shrink-0">
                                <div class="h-full bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl border-2 border-indigo-100 flex items-center justify-center overflow-hidden shadow-inner relative">
                                    {{-- Decorative corner --}}
                                    <div class="absolute top-1 right-1 w-3 h-3 bg-gradient-to-br from-indigo-400 to-purple-400 rounded-full opacity-20"></div>
                                    <div class="absolute bottom-1 left-1 w-2 h-2 bg-gradient-to-br from-pink-400 to-purple-400 rounded-full opacity-20"></div>

                                    @if ($course->thumbnail)
                                        <img src="{{ Str::startsWith($course->thumbnail, 'http') ? $course->thumbnail : asset($course->thumbnail) }}"
                                            alt="{{ $course->title }}"
                                            class="w-full h-full object-cover rounded-lg shadow-md group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="text-center text-indigo-400">
                                            <div class="text-2xl mb-1">📚</div>
                                            <span class="text-xs font-medium"># Gambar</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Content Section (Right Side) --}}
                            <div class="w-3/4 p-4 flex flex-col justify-between">
                                {{-- Title --}}
                                <div class="mb-3">
                                    <h4 class="text-lg font-bold text-indigo-800 leading-tight mb-2">{{ $course->title }}</h4>

                                    {{-- Description --}}
                                    <p class="text-sm text-gray-600 leading-relaxed line-clamp-2">
                                        {{ Str::limit($course->description ?? 'Deskripsi kursus akan segera tersedia.', 80) }}
                                    </p>
                                </div>

                                {{-- Bottom Section --}}
                                <div class="space-y-3">
                                    {{-- Level Badge dan Price --}}
                                    <div class="flex justify-between items-center">
                                        <span class="inline-flex items-center px-3 py-1 text-xs font-bold rounded-full border shadow-sm
                                            {{ $course->level === 'Pemula'
                                                ? 'bg-emerald-50 text-emerald-700 border-emerald-200'
                                                : ($course->level === 'Menengah'
                                                    ? 'bg-amber-50 text-amber-700 border-amber-200'
                                                    : 'bg-rose-50 text-rose-700 border-rose-200') }}">
                                            <span class="w-1.5 h-1.5 rounded-full mr-1
                                                {{ $course->level === 'Pemula'
                                                    ? 'bg-emerald-400'
                                                    : ($course->level === 'Menengah'
                                                        ? 'bg-amber-400'
                                                        : 'bg-rose-400') }}"></span>
                                            {{ $course->level }}
                                        </span>

                                        <div class="text-right">
                                            <p class="text-xs text-gray-500">Harga</p>
                                            <p class="text-lg font-bold text-indigo-600">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                                        </div>
                                    </div>

                                    {{-- Button --}}
                                    <a href="{{ route('courses.show', $course->id) }}"
                                        class="block w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 text-purple-100 font-semibold py-2.5 px-4 rounded-xl hover:from-indigo-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl border-2 border-transparent hover:border-indigo-300">
                                        <span class="flex items-center justify-center text-sm">
                                            <span>Lihat Detail</span>
                                            <svg class="w-3 h-3 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Decorative bottom border --}}
                        <div class="h-1 bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400"></div>
                    </div>
                @endforeach
            </div>

            {{-- Empty state jika tidak ada courses --}}
            @if($courses->isEmpty())
                <div class="text-center py-16">
                    <div class="text-6xl mb-4">📚</div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum ada kursus tersedia</h3>
                    <p class="text-gray-500">Kursus akan segera ditambahkan. Silakan cek kembali nanti!</p>
                </div>
            @endif
        </div>
    </div>

    {{-- Custom CSS untuk line-clamp --}}
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</x-app-layout>
