<x-app-layout>
    @section('header')
        <h2 class="font-semibold text-3xl text-white leading-tight">
            Review Portofolio
        </h2>
    @endsection

    <section class="py-12 px-4 bg-gray-100">
        <div class="container mx-auto max-w-3xl">
            <!-- Judul Halaman -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-800">Review Portofolio</h1>
                <p class="text-gray-600">Tulis pendapatmu dan lihat review orang lain.</p>
            </div>

            <!-- Form Tambah Review -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-10">
                <h3 class="text-2xl font-semibold mb-4">Tulis Review Baru</h3>
                <form action="{{ route('reviews.store', $portfolio->id) }}" method="POST">
                    @csrf
                    <textarea name="content" rows="4" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring focus:border-blue-300" placeholder="Tulis review di sini..." required></textarea>
                    <button type="submit" class="mt-4 bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700 transition duration-300">
                        Kirim Review
                    </button>
                </form>
            </div>

            <!-- Daftar Review -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold mb-4">Daftar Review</h3>

                @if ($reviews->isEmpty())
                    <p class="text-gray-500">Belum ada review untuk portofolio ini.</p>
                @else
                    @foreach ($reviews as $review)
                        <div class="border-b border-gray-200 py-4">
                            <p class="text-gray-800">{{ $review->content }}</p>
                            <small class="text-gray-500">Ditulis oleh {{ $review->user->name ?? 'Pengguna' }} pada {{ $review->created_at->format('d M Y') }}</small>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-8 text-center">
                <a href="{{ route('portfolio.show', $portfolio->id) }}" class="bg-gray-600 text-white py-2 px-6 rounded hover:bg-gray-700 transition duration-300">
                    ⬅️ Kembali ke Portofolio
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
