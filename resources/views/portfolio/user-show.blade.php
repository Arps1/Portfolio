<x-app-layout>
    @section('header')
        <h2 class="font-semibold text-3xl text-white leading-tight">
            Detail Portofolio
        </h2>
    @endsection

    <style>
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
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .portfolio-image-container:hover .portfolio-image {
            transform: scale(1.1);
        }

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
            word-wrap: break-word;
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

        .btn-container {
            margin-top: 20px;
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-container a,
        .btn-download {
            padding: 12px 24px;
            font-size: 1rem;
            border-radius: 8px;
            text-align: center;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-back {
            background-color: #6c757d;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

        .btn-download {
            background-color: #28a745;
        }

        .btn-download:hover {
            background-color: #218838;
        }
    </style>

    <section class="py-16 px-4 bg-gray-100">
        <div class="container mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800">Detail Portofolio</h1>
                <p class="text-lg text-gray-600 mt-4">Informasi lengkap tentang portofolio ini.</p>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="portfolio-image-container">
                    <img src="{{ $portfolio->image ? asset('storage/' . $portfolio->image) : 'https://via.placeholder.com/500x300' }}" alt="{{ $portfolio->title }}" class="portfolio-image">
                    <div class="zoom-control" onclick="zoomImage()">🔍</div>
                </div>

                <div class="portfolio-details">
                    <h3>{{ $portfolio->title }}</h3>
                    <p>{{ $portfolio->description }}</p>
                    <p>Link: 
                        @if($portfolio->link)
                            <a href="{{ $portfolio->link }}" target="_blank">{{ $portfolio->link }}</a>
                        @else
                            -
                        @endif
                    </p>

                    @if($portfolio->image)
                        <div class="mt-4">
                            <strong>Unduh Gambar:</strong> 
                            <a href="{{ asset('storage/' . $portfolio->image) }}" 
                               download="{{ basename($portfolio->image) }}" 
                               class="btn-download inline-block mt-2">
                                ⬇️ Unduh Gambar
                            </a>
                        </div>
                    @endif

                    @if($portfolio->file)
                        <div class="mt-4">
                            <strong>Unduh File:</strong> 
                            <a href="{{ asset('storage/' . $portfolio->file) }}" 
                               download="{{ basename($portfolio->file) }}" 
                               class="btn-download inline-block mt-2 ml-2">
                               ⬇️ Unduh File
                            </a>
                        </div>
                    @endif

                    <div class="btn-container mt-4">
                        <a href="{{ route('portfolio.index') }}" class="btn-back">Kembali ke Daftar Portofolio</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let zoomLevel = 1;
        function zoomImage() {
            const image = document.querySelector('.portfolio-image');
            zoomLevel += 0.1;
            if (zoomLevel > 2) zoomLevel = 1;
            image.style.transform = `scale(${zoomLevel})`;
        }
    </script>
</x-app-layout>
