<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    @vite('resources/css/app.css') {{-- Jika pakai Vite --}}
</head>
<body class="bg-gray-100 font-sans antialiased">

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-blue-500 via-purple-600 to-pink-500 py-24 text-white overflow-hidden">
        <!-- Background SVG -->
        <svg class="absolute bottom-0 left-0 w-full h-48 text-white opacity-10" fill="currentColor" viewBox="0 0 1440 320">
            <path fill-opacity="1" d="M0,192L48,181.3C96,171,192,149,288,154.7C384,160,480,192,576,181.3C672,171,768,117,864,101.3C960,85,1056,107,1152,112C1248,117,1344,107,1392,101.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Selamat Datang di Website Portofolio</h1>
            <p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto">Jelajahi karya, pelajari lebih dalam tentang saya, dan temukan layanan yang saya tawarkan.</p>
            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ route('login') }}"
                   class="bg-white text-purple-700 hover:bg-purple-100 px-6 py-3 rounded-full font-semibold shadow transition duration-300">
                   Login
                </a>
                <a href="{{ route('register') }}"
                   class="bg-white text-blue-700 hover:bg-blue-100 px-6 py-3 rounded-full font-semibold shadow transition duration-300">
                   Register
                </a>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Kenapa Portofolio Ini?</h2>
            <p class="text-gray-600 max-w-2xl mx-auto leading-relaxed text-lg">
                Portofolio ini menampilkan proyek-proyek terbaik saya dalam pengembangan web, desain UI/UX, dan solusi digital lainnya. Cocok untuk perekrut, klien, maupun kolaborator yang ingin mengenal kemampuan saya lebih dalam.
            </p>
        </div>
    </section>

</body>
</html>
