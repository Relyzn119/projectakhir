<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relyzn Course</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- HEADER -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-indigo-600">Relyzn Course</div>
            <nav class="space-x-4">
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 text-sm">Masuk</a>
                <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 text-sm">Daftar</a>
            </nav>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="bg-indigo-50 py-20 text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h1 class="text-4xl font-bold mb-4">Tingkatkan Skill Codingmu</h1>
            <p class="text-lg text-gray-600 mb-6">Pelajari berbagai bahasa pemrograman dan framework dari nol sampai mahir.</p>
            <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-6 py-3 rounded hover:bg-indigo-700">Mulai Belajar</a>
        </div>
    </section>

    <!-- KURSUS POPULER -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-2xl font-bold mb-8 text-center">Kursus Terfavorit</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow rounded overflow-hidden">
                    <div class="h-40 bg-gray-300 flex items-center justify-center"># Gambar</div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Laravel Dasar</h3>
                        <p class="text-sm text-gray-600">Mulai membangun aplikasi web dengan Laravel.</p>
                    </div>
                </div>
                <div class="bg-white shadow rounded overflow-hidden">
                    <div class="h-40 bg-gray-300 flex items-center justify-center"># Gambar</div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Java OOP & Spring</h3>
                        <p class="text-sm text-gray-600">Pahami konsep OOP dan framework backend modern.</p>
                    </div>
                </div>
                <div class="bg-white shadow rounded overflow-hidden">
                    <div class="h-40 bg-gray-300 flex items-center justify-center"># Gambar</div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Dasar Golang</h3>
                        <p class="text-sm text-gray-600">Bahasa modern untuk aplikasi cepat dan efisien.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA TERAKHIR -->
    <section class="bg-indigo-600 py-12 text-center text-white">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="text-2xl font-bold mb-4">Gabung Bersama Ribuan Siswa Lainnya</h2>
            <p class="mb-6">Tersedia kursus untuk pemula hingga tingkat mahir. Akses kapan saja, di mana saja.</p>
            <a href="{{ route('register') }}" class="bg-white text-indigo-600 px-6 py-2 rounded hover:bg-gray-100 font-semibold">Daftar Sekarang</a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-white border-t mt-12 py-4 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Relyzn Course. Semua hak dilindungi.
    </footer>

</body>
</html>
