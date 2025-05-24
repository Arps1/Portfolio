@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-3xl text-white leading-tight">
        Detail Portofolio
    </h2>
@endsection

@section('content')
<style>
    /* Kontainer gambar dengan kemampuan scroll dan tampilan lebih responsif */
    .portfolio-image-container {
        position: relative;
        max-width: 100%;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 450px;
    }

    .portfolio-image {
        width: 100%;
        height: 100%;
        object-fit: contain; /* Menjaga proporsi gambar */
        transition: transform 0.3s ease; /* Animasi zoom */
    }

    .portfolio-image-container:hover .portfolio-image {
        transform: scale(1.1); /* Zoom saat hover */
    }

    /* Kontrol zoom */
    .zoom-control {
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 10;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 10px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 18px;
    }

    .zoom-control:hover {
        background-color: rgba(0, 0, 0, 0.7);
    }

    /* Styling untuk tombol dan teks lainnya */
    .portfolio-details {
        padding: 24px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-top: 20px;
    }

    .portfolio-details h3 {
        font-size: 1.75rem;
        font-weight: 600;
        color: #333;
    }

    .portfolio-details p {
        font-size: 1rem;
        color: #555;
        margin-top: 10px;
    }

    .portfolio-details a {
        font-size: 1rem;
        color: #007BFF;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .portfolio-details a:hover {
        color: #0056b3;
    }

    /* Tombol Kembali dan Admin */
    .btn-container {
        display: flex;
        gap: 10px;
        margin-top: 20px;
        justify-content: space-between;
    }

    .btn-container a, .btn-container form button {
        padding: 12px 24px;
        font-size: 1rem;
        text-align: center;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-container .btn-back {
        background-color: #6c757d;
        color: white;
    }

    .btn-container .btn-back:hover {
        background-color: #5a6268;
    }

    .btn-container .btn-edit {
        background-color: #007bff;
        color: white;
    }

    .btn-container .btn-edit:hover {
        background-color: #0056b3;
    }

    .btn-container .btn-delete {
        background-color: #dc3545;
        color: white;
    }

    .btn-container .btn-delete:hover {
        background-color: #c82333;
    }
</style>

<section class="py-16 px-4 bg-gray-100">
    <div class="container mx-auto">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Detail Portofolio</h1>
            <p class="text-lg text-gray-600 mt-4">Informasi lengkap tentang portofolio ini.</p>
        </div>

        <!-- Detail Portofolio -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Gambar dengan kemampuan scroll dan zoom -->
            <div class="portfolio-image-container">
                <img src="{{ $portfolio->image ? asset('storage/' . $portfolio->image) : 'https://via.placeholder.com/500x300' }}" alt="{{ $portfolio->title }}" class="portfolio-image">
                <div class="zoom-control" onclick="zoomImage()">🔍</div>
            </div>

            <div class="portfolio-details">
                <h3>{{ $portfolio->title }}</h3>
                <p>{{ $portfolio->description }}</p>
                <p>Link: <a href="{{ $portfolio->link }}" target="_blank">{{ $portfolio->link }}</a></p>

                <!-- Tombol Kembali -->
                <div class="btn-container">
                    <a href="{{ route('portfolio.index') }}" class="btn-back">Kembali ke Daftar Portofolio</a>
                    @if (Auth::user()->role == 'admin')
                        <div>
                            <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let zoomLevel = 1;

    // Fungsi untuk zoom in dan zoom out gambar
    function zoomImage() {
        const image = document.querySelector('.portfolio-image');
        zoomLevel += 0.1;
        if (zoomLevel > 2) zoomLevel = 1; // Reset ke ukuran asli setelah zoom in maksimal

        // Apply transform scale ke gambar
        image.style.transform = `scale(${zoomLevel})`;
    }
</script>

@endsection
