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

    <!-- Content Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto max-w-7xl">
            @if(session('error'))
                <div class="bg-red-200 text-red-700 p-4 rounded-lg mb-6">
                    <strong>Error: </strong>{{ session('error') }}
                </div>
            @endif

            <!-- Dashboard Section -->
            <div class="bg-white p-8 rounded-xl shadow-xl">
                <h2 class="text-3xl font-bold mb-4">
                    {{ auth()->user()->role === 'admin' ? 'Dashboard Admin' : 'Dashboard Pengguna' }}
                </h2>
                <p class="mb-8 text-gray-700">
                    {{ auth()->user()->role === 'admin' ? 'Selamat datang, Admin! Anda bisa mengelola portofolio dan pengaturan.' : 'Lihat portofolio, kontak saya, dan informasi lainnya.' }}
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Karya -->
                    <div class="bg-blue-100 p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold text-blue-800">Lihat Karya</h3>
                        <p class="text-gray-700 mt-2 mb-4">Lihat dan kelola karya yang telah dibuat.</p>
                        <a href="{{ auth()->user()->role === 'admin' ? route('portfolio.index') : route('portfolio') }}" 
                        class="text-blue-600 hover:underline font-medium">Akses</a>
                    </div>

                    <!-- Kontak -->
                    <div class="bg-green-100 p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold text-green-800">Hubungi Saya</h3>
                        <p class="text-gray-700 mt-2 mb-4">Tertarik kerja sama atau tanya-tanya? Hubungi saya.</p>
                        <a href="{{ route('kontak.index') }}" class="text-green-600 hover:underline font-medium">Akses</a>
                    </div>

                    <!-- Khusus Admin: Kelola Pengguna -->
                    @if(auth()->user()->role === 'admin')
                        <div class="bg-yellow-100 p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-semibold text-yellow-800">Kelola Pengguna</h3>
                            <p class="text-gray-700 mt-2 mb-4">Lihat dan atur pengguna yang terdaftar.</p>
                            <a href="{{ route('admin.users.index') }}" class="text-yellow-600 hover:underline font-medium">Akses</a>
                        </div>
                    @else
                        <!-- Untuk User: Tentang Saya -->
                        <div class="bg-purple-100 p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-semibold text-purple-800">Tentang Saya</h3>
                            <p class="text-gray-700 mt-2 mb-4">Pelajari lebih lanjut tentang siapa saya.</p>
                            <a href="{{ route('tentang') }}" class="text-purple-600 hover:underline font-medium">Akses</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
