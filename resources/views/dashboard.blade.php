<x-app-layout>
    <!-- Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight">
            Portofolio Profesional
        </h2>
    </x-slot>

    <!-- Hero Section -->
    <section class="hero bg-gradient-to-r from-blue-500 via-purple-600 to-pink-500 py-20 text-center text-white">
        <div class="container mx-auto">
            <h1 class="text-5xl font-bold mb-6">Selamat Datang di Portofolio Saya</h1>
            <p class="text-lg mb-6">Lihat karya saya dan pelajari lebih lanjut tentang konsep, kontak, dan layanan yang saya tawarkan.</p>
        </div>
    </section>

    <!-- Dashboard Content Section -->
    <section class="py-16">
        <div class="container mx-auto">
            @if(session('error'))
                <div class="bg-red-200 text-red-700 p-4 rounded-lg mb-6">
                    <strong>Error: </strong>{{ session('error') }}
                </div>
            @endif

            @if(auth()->user()->role === 'admin')
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-bold mb-4">Dashboard Admin</h2>
                    <p class="mb-6">Selamat datang, Admin! Anda bisa mengelola portofolio dan pengaturan.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-blue-200 p-4 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold">Kelola Karya</h3>
                            <p class="text-gray-700">Tambah, ubah, dan hapus karya Anda.</p>
                            <a href="{{ route('portfolio.index') }}" class="text-blue-600">Lihat Karya</a>
                        </div>
                        <div class="bg-green-200 p-4 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold">Kerja Sama dengan Saya</h3>
                            <p class="text-gray-700">Tertarik kerja sama? Hubungi saya!</p>
                            <a href="{{ route('kontak.index') }}" class="text-green-600">Hubungi Saya</a>
                        </div>
                        <div class="bg-yellow-200 p-4 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold">Kelola Pengguna</h3>
                            <p class="text-gray-700">Kelola pengguna yang terdaftar.</p>
                            <a href="{{ route('admin.users.index') }}" class="text-yellow-600">Lihat Pengguna</a>
                            </div>
                    </div>
                </div>
            @else
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-bold mb-4">Dashboard Pengguna</h2>
                    <p class="mb-6">Lihat portofolio, kontak saya, dan informasi lainnya.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-200 p-4 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold">Lihat Karya</h3>
                            <p class="text-gray-700">Lihat karya yang telah saya buat.</p>
                            <a href="{{ route('portfolio.index') }}" class="text-blue-600">Lihat Karya</a>
                        </div>
                        <div class="bg-green-200 p-4 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold">Tentang Saya</h3>
                            <p class="text-gray-700">Pelajari lebih lanjut tentang saya.</p>
                            <a href="{{ route('tentang') }}" class="text-green-600">Tentang Saya</a>
                        </div>
                        <div class="bg-green-200 p-4 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold">Kerja Sama dengan Saya</h3>
                            <p class="text-gray-700">Tertarik kerja sama? Hubungi saya!</p>
                            <a href="{{ route('kontak.index') }}" class="text-green-600">Hubungi Saya</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-app-layout>
