<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relyzn Course</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-800">


    <!-- Tambahkan ke dalam <head> halaman kamu -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Great+Vibes&display=swap"
        rel="stylesheet">
    <style>
        .fancy-title {
            font-family: 'Playfair Display', serif;
        }

        .fancy-sub {
            font-family: 'Great Vibes', cursive;
        }
    </style>


    <!-- HEADER -->
    <header class="bg-gradient-to-r from-black via-indigo-50 to-purple-100 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
            <!-- Judul Logo -->
            <div
                class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-700 via-pink-500 to-indigo-600 fancy-title tracking-wide drop-shadow-md">
                Relyzn Course
            </div>

            <!-- Navigasi -->
            <nav class="space-x-4">
                <a href="{{ route('login') }}"
                    class="text-indigo-700 hover:text-fuchsia-600 font-medium text-sm transition duration-200">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                    class="bg-gradient-to-r from-pink-600 via-purple-600 to-indigo-500 text-white px-5 py-2 rounded-full shadow-lg hover:shadow-xl hover:brightness-110 transition-all duration-300 ease-in-out text-sm font-semibold">
                    Daftar
                </a>
            </nav>
        </div>
    </header>


    <!-- HERO SECTION -->
    <section
        class="bg-gradient-to-br from-black via-gray-900 to-purple-950 py-24 text-center relative overflow-hidden shadow-inner">

        <div class="absolute top-[-4rem] left-[-4rem] w-80 h-80 bg-purple-500 opacity-20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-[-4rem] right-[-4rem] w-96 h-96 bg-pink-600 opacity-20 rounded-full blur-3xl"></div>

        <div class="max-w-5xl mx-auto px-6 relative z-10">
            <h1
                class="text-6xl font-extrabold bg-gradient-to-r from-purple-300 via-pink-300 to-indigo-400 bg-clip-text text-transparent mb-6 tracking-tight drop-shadow-md">
                Tingkatkan <span class="fancy-title">Skill Codingmu</span>
            </h1>
            <p class="text-lg text-gray-300 mb-8 font-medium leading-relaxed">
                Pelajari berbagai bahasa pemrograman & framework dari <span
                    class="fancy-sub text-purple-300 text-xl">nol</span> sampai <span
                    class="fancy-sub text-pink-300 text-xl">mahir</span>.
            </p>
            <a href="{{ route('register') }}"
                class="inline-block bg-gradient-to-r from-purple-600 via-pink-500 to-indigo-500 text-white px-10 py-4 rounded-full shadow-lg hover:shadow-2xl hover:scale-105 hover:brightness-110 transition-all duration-300 font-semibold text-lg tracking-wide">
                ✨ Mulai Belajar ✨
            </a>
        </div>
    </section>


    <!-- KURSUS TERFAVORIT -->
    <section
        class="py-24 bg-gradient-to-br from-black via-[#1f0e2d] to-[#101014] text-white font-['Poppins'] relative overflow-hidden">
        <!-- Background Ornaments -->
        <div
            class="absolute top-[-5rem] right-[-5rem] w-[30rem] h-[30rem] bg-pink-500 opacity-30 blur-3xl rounded-full z-0">
        </div>
        <div
            class="absolute bottom-[-6rem] left-[-6rem] w-[24rem] h-[24rem] bg-purple-700 opacity-25 blur-3xl rounded-full z-0">
        </div>
        <div class="absolute inset-0 bg-gradient-radial from-white/5 to-transparent z-0"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <h2
                class="text-5xl md:text-6xl font-bold mb-16 text-center tracking-wider bg-gradient-to-r from-pink-400 via-white to-purple-400 text-transparent bg-clip-text drop-shadow-xl fancy-title">
                ✨ Kursus Terfavorit ✨
            </h2>
            <a href="{{ route('register') }}">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">

                    <!-- CARD 1 -->

                    <div
                        class="bg-gradient-to-br from-[#1a1a2e] via-[#2e1437] to-[#1b1b2f] rounded-3xl overflow-hidden shadow-xl transition-all duration-300 transform hover:-translate-y-3 hover:shadow-purple-500/40 border border-purple-500/10 cursor-pointer">
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('images/Laravel.jpg') }}" alt="Laravel Dasar"
                                class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white font-serif italic mb-1">Laravel Dasar</h3>
                            <p class="text-white/80 text-sm font-light">Mulai membangun aplikasi web dengan Laravel.</p>
                        </div>
                    </div>

                    <!-- CARD 2 -->
                    <div
                        class="bg-gradient-to-br from-[#181828] via-[#311734] to-[#1b1b2f] rounded-3xl overflow-hidden shadow-xl hover:shadow-blue-500/40 transition-all duration-300 transform hover:-translate-y-3 border border-blue-500/10 cursor-pointer">
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('images/PHP.jpg') }}" alt="Java OOP & Spring"
                                class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white font-serif italic mb-1">Java OOP & Spring</h3>
                            <p class="text-white/80 text-sm font-light">Pahami konsep OOP dan framework backend modern.
                            </p>
                        </div>
                    </div>

                    <!-- CARD 3 -->
                    <div
                        class="bg-gradient-to-br from-[#12121f] via-[#341b3a] to-[#1b1b2f] rounded-3xl overflow-hidden shadow-xl hover:shadow-green-400/40 transition-all duration-300 transform hover:-translate-y-3 border border-green-500/10 cursor-pointer">
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('images/GO.LANG.png') }}" alt="Dasar Golang"
                                class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white font-serif italic mb-1">Dasar Golang</h3>
                            <p class="text-white/80 text-sm font-light">Bahasa modern untuk aplikasi cepat dan efisien.
                            </p>
                        </div>
                    </div>

                    <!-- CARD 4 -->
                    <div
                        class="bg-gradient-to-br from-[#1c1c2c] via-[#311d3d] to-[#181827] rounded-3xl overflow-hidden shadow-xl hover:shadow-pink-400/30 transition-all duration-300 transform hover:-translate-y-3 border border-pink-400/10 cursor-pointer">
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('images/Laravel.jpg') }}" alt="Laravel Dasar"
                                class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white font-serif italic mb-1">Laravel Dasar</h3>
                            <p class="text-white/80 text-sm font-light">Mulai membangun aplikasi web dengan Laravel.</p>
                        </div>
                    </div>

                    <!-- CARD 5 -->
                    <div
                        class="bg-gradient-to-br from-[#141421] via-[#2f1844] to-[#161627] rounded-3xl overflow-hidden shadow-xl hover:shadow-blue-300/40 transition-all duration-300 transform hover:-translate-y-3 border border-blue-400/10 cursor-pointer">
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('images/PYTHON.png') }}" alt="Python"
                                class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white font-serif italic mb-1">Python</h3>
                            <p class="text-white/80 text-sm font-light">Bahasa serbaguna untuk berbagai kebutuhan
                                aplikasi.</p>
                        </div>
                    </div>

                    <!-- CARD 6 -->
                    <div
                        class="bg-gradient-to-br from-[#131322] via-[#2c1540] to-[#161626] rounded-3xl overflow-hidden shadow-xl hover:shadow-yellow-400/40 transition-all duration-300 transform hover:-translate-y-3 border border-yellow-400/10 cursor-pointer">
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('images/DATA.png') }}" alt="Data Scientist"
                                class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white font-serif italic mb-1">Data Scientist</h3>
                            <p class="text-white/80 text-sm font-light">Pelajari analisis data dan model prediktif.</p>
                        </div>
                    </div>

                    <!-- CARD 7 -->
                    <div
                        class="bg-gradient-to-br from-[#101020] via-[#2b143c] to-[#1a1a2b] rounded-3xl overflow-hidden shadow-xl hover:shadow-teal-300/40 transition-all duration-300 transform hover:-translate-y-3 border border-teal-300/10 cursor-pointer">
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('images/INTERNET.png') }}" alt="Internet of Things"
                                class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white font-serif italic mb-1">Internet of Things</h3>
                            <p class="text-white/80 text-sm font-light">Teknologi perangkat pintar yang saling
                                terhubung.</p>
                        </div>
                    </div>

                    <!-- CARD 8 -->
                    <div
                        class="bg-gradient-to-br from-[#121221] via-[#2e1941] to-[#19192a] rounded-3xl overflow-hidden shadow-xl hover:shadow-cyan-400/40 transition-all duration-300 transform hover:-translate-y-3 border border-cyan-300/10 cursor-pointer">
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('images/MACHINE.jpg') }}" alt="Machine Learning"
                                class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white font-serif italic mb-1">Machine Learning</h3>
                            <p class="text-white/80 text-sm font-light">Pelajari cara membuat sistem belajar dari data.
                            </p>
                        </div>
                    </div>

                    <!-- CARD 9 -->
                    <div
                        class="bg-gradient-to-br from-[#151528] via-[#2d1a42] to-[#1b1b2c] rounded-3xl overflow-hidden shadow-xl hover:shadow-rose-400/40 transition-all duration-300 transform hover:-translate-y-3 border border-rose-400/10 cursor-pointer">
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('images/JAVA.jpg') }}" alt="Java Spring Boot Basics"
                                class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white font-serif italic mb-1">Java Spring Boot Basics
                            </h3>
                            <p class="text-white/80 text-sm font-light">Bangun REST API modern dengan Spring Boot.</p>
                        </div>
                    </div>

                </div>
        </div>
    </section>


    <!-- CTA TERAKHIR -->
    <section
        class="relative py-28 bg-gradient-to-br from-black via-grey-900 to-purple-950 overflow-hidden rounded-[2rem] shadow-2xl mx-6 mt-24">
        <div
            class="absolute top-0 left-1/2 w-96 h-96 bg-purple-700 opacity-25 blur-3xl rounded-full -translate-x-1/2 -translate-y-1/2">
        </div>
        <div
            class="absolute bottom-0 right-1/3 w-72 h-72 bg-fuchsia-500 opacity-20 blur-2xl rounded-full translate-x-1/2 translate-y-1/2">
        </div>

        <div class="max-w-3xl mx-auto px-6 relative z-10 text-center">
            <h2
                class="text-5xl md:text-6xl font-extrabold bg-gradient-to-r from-purple-300 via-pink-400 to-yellow-300 bg-clip-text text-transparent mb-8 drop-shadow-xl leading-snug tracking-tight">
                ✨ Bergabunglah Bersama <span class="fancy-title">Ribuan Siswa</span> ✨
            </h2>
            <p class="text-lg md:text-xl text-gray-300 mb-12 leading-relaxed">
                Dari pemula hingga tingkat mahir, pelajari kursus interaktif kapan saja & di mana saja. Saatnya kamu
                mulai perjalanan barumu!
            </p>
            <a href="{{ route('register') }}"
                class="inline-block bg-gradient-to-r from-purple-600 via-pink-500 to-yellow-400 text-black hover:from-pink-500 hover:to-purple-600 transition-all duration-300 px-12 py-4 rounded-full text-lg font-semibold shadow-lg hover:shadow-2xl">
                🎓 Daftar Sekarang
            </a>
        </div>
    </section>


    <!-- FOOTER -->
    <footer
        class="bg-gradient-to-t from-black via-gray-900 to-purple-950 py-6 text-center text-sm text-gray-400 border-t border-gray-800 mt-20">
        &copy; {{ date('Y') }} <span class="text-pink-400 font-semibold">Relyzn Course</span>. Semua hak
        dilindungi.
    </footer>

</body>

</html>
