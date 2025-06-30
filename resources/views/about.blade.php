<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-400 leading-tight">
            {{ __('Tentang Kami') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-white min-h-screen">
        <div class="max-w-5xl mx-auto px-6">
            <div class="bg-gray-800 p-8 rounded shadow">
                <h3 class="text-2xl font-bold mb-4 text-purple-400">Siapa Kami?</h3>
                <p class="text-gray-300 mb-6">
                    <strong>Relyzn Course</strong> adalah platform pembelajaran daring yang menyediakan kursus-kursus pemrograman modern untuk membantu kamu menjadi developer yang handal. Kami percaya bahwa setiap orang punya potensi untuk belajar dan berkembang di dunia teknologi.
                </p>

                <h3 class="text-xl font-semibold mb-3 text-purple-400">Visi Kami</h3>
                <p class="text-gray-300 mb-6">
                    Menjadi tempat belajar coding terfavorit di Indonesia dengan menyediakan materi berkualitas, mentor yang berpengalaman, dan komunitas yang suportif.
                </p>

                <h3 class="text-xl font-semibold mb-3 text-purple-400">Misi Kami</h3>
                <ul class="list-disc list-inside text-gray-300 space-y-2">
                    <li>Membuat materi pemrograman mudah diakses dan dipahami.</li>
                    <li>Memberikan pengalaman belajar yang menyenangkan dan interaktif.</li>
                    <li>Mendukung pengembangan skill digital untuk masa depan karier kamu.</li>
                </ul>

                <div class="mt-10 text-center">
                    <a href="{{ route('courses.index') }}" class="inline-block px-6 py-2 bg-purple-500 text-white rounded hover:bg-purple-600 transition">
                        Lihat Kursus Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
