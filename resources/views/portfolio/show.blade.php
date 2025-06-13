<x-app-layout>
    @section('header')
        <h2 class="font-semibold text-3xl text-white leading-tight">
            Detail Portofolio
        </h2>
    @endsection

    <section class="py-16 px-4 bg-gray-100">
        <div class="container mx-auto max-w-5xl">
            <!-- Judul Halaman -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800">Detail Portofolio</h1>
                <p class="text-lg text-gray-600 mt-2">Informasi lengkap tentang portofolio ini</p>
            </div>

            <!-- Kartu Portofolio -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- Gambar -->
                <div class="relative w-full h-[450px] flex items-center justify-center overflow-hidden group">
                    <img src="{{ $portfolio->image ? asset('storage/' . $portfolio->image) : 'https://via.placeholder.com/500x300' }}"
                         alt="{{ $portfolio->title }}"
                         class="object-contain w-full h-full transition-transform duration-300 group-hover:scale-110"
                         id="portfolioImage">
                    <div class="absolute top-4 right-4 bg-black/50 text-white p-2 rounded-full cursor-pointer hover:bg-black/70"
                         onclick="zoomImage()">🔍</div>
                </div>

                <!-- Informasi Detail -->
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800">{{ $portfolio->title }}</h3>
                    <p class="text-gray-600 mt-2">{{ $portfolio->description }}</p>
                    <p class="mt-2 text-gray-700">
                        Link:
                        @if($portfolio->link)
                            <a href="{{ $portfolio->link }}" target="_blank" class="text-blue-600 hover:underline">
                                {{ $portfolio->link }}
                            </a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </p>

                    <!-- Unduh Gambar -->
                    @if($portfolio->image)
                        <div class="mt-4">
                            <a href="{{ asset('storage/' . $portfolio->image) }}"
                               download="{{ basename($portfolio->image) }}"
                               class="inline-block min-w-[140px] px-4 py-2 bg-green-600 text-white text-sm font-medium text-center rounded-md hover:bg-green-700 transition">
                                ⬇️ Unduh Gambar
                            </a>
                        </div>
                    @endif

                    <!-- Unduh File -->
                    @if($portfolio->file)
                        <div class="mt-4">
                            <a href="{{ asset('storage/' . $portfolio->file) }}"
                               download="{{ basename($portfolio->file) }}"
                               class="inline-block min-w-[140px] px-4 py-2 bg-green-600 text-white text-sm font-medium text-center rounded-md hover:bg-green-700 transition">
                                ⬇️ Unduh File
                            </a>
                        </div>
                    @endif

                    <!-- Review -->
                    <div class="mt-6">
                        <h4 class="text-lg font-semibold text-gray-700 mb-2">Review</h4>
                        <a href="{{ route('reviews.index', $portfolio->id) }}"
                           class="inline-flex items-center gap-2 min-w-[140px] px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-md shadow hover:bg-purple-700 transition">
                            ✍️ Lihat & Tulis Review
                        </a>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="mt-6 flex flex-wrap gap-4 justify-between items-center">
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('portfolio.index') }}"
                               class="inline-block min-w-[140px] px-4 py-2 bg-gray-600 text-white text-sm font-medium text-center rounded-md hover:bg-gray-700 transition">
                                ⬅️ Kembali
                            </a>

                            <div class="flex gap-3 flex-wrap">
                                <a href="{{ route('portfolio.edit', $portfolio->id) }}"
                                   class="inline-block min-w-[140px] px-4 py-2 bg-blue-600 text-white text-sm font-medium text-center rounded-md hover:bg-blue-700 transition">
                                    ✏️ Edit
                                </a>

                                <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus portofolio ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="min-w-[140px] px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        @elseif(Auth::user()->role == 'user')
                            <a href="{{ route('portfolio') }}"
                               class="inline-block min-w-[140px] px-4 py-2 bg-gray-600 text-white text-sm font-medium text-center rounded-md hover:bg-gray-700 transition">
                                ⬅️ Kembali
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Script Zoom -->
    <script>
        let zoomLevel = 1;
        function zoomImage() {
            const img = document.getElementById('portfolioImage');
            zoomLevel += 0.2;
            if (zoomLevel > 2) zoomLevel = 1;
            img.style.transform = `scale(${zoomLevel})`;
        }
    </script>
</x-app-layout>
