<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight">
            Portofolio Saya
        </h2>
    </x-slot>

    <section class="py-16 px-4 bg-gray-100">
        <div class="max-w-7xl mx-auto">
            <!-- Hero Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800">Selamat datang di Portofolio Saya</h1>
                <p class="text-lg text-gray-600 mt-4">Lihat beberapa proyek yang telah saya kerjakan dan keterampilan yang saya miliki.</p>
            </div>

            <!-- Daftar Proyek Pengguna -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($portfolios as $portfolio)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img src="{{ $portfolio->image ? asset('storage/' . $portfolio->image) : 'https://via.placeholder.com/500x300' }}" 
                             alt="{{ $portfolio->title }}" 
                             class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $portfolio->title }}</h3>
                            <p class="text-gray-600 mt-2">{{ \Illuminate\Support\Str::limit($portfolio->description, 100) }}</p>
                            <a href="{{ route('portfolio.show', $portfolio->id) }}" class="mt-4 inline-block text-blue-500 hover:text-blue-700">Lihat Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Menampilkan pesan jika tidak ada proyek -->
            @if ($portfolios->isEmpty())
                <div class="text-center text-gray-600 mt-12">
                    Belum ada proyek yang ditampilkan.
                </div>
            @endif

            <!-- Bagian Kontak -->
            <div class="mt-16 text-center">
                <h2 class="text-3xl font-bold text-gray-800">Hubungi Saya</h2>
                <p class="text-gray-600 mt-4">Jika Anda tertarik untuk bekerja bersama saya atau ingin mendiskusikan proyek, jangan ragu untuk menghubungi saya!</p>
                <a href="{{ route('kontak') }}" class="mt-8 inline-block bg-blue-700 hover:bg-blue-800 text-white py-2 px-6 rounded-lg shadow-lg transition duration-300">Kontak Saya</a>
            </div>
        </div>
    </section>
</x-app-layout>
