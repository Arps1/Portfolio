<x-app-layout>
    @section('header')
        <h2 class="font-semibold text-3xl text-white leading-tight">
            {{ isset($portfolio) ? 'Edit Portfolio' : 'Tambah Portfolio' }}
        </h2>
    @endsection

    <style>
        .portfolio-form-section {
            background: linear-gradient(135deg, #e0f7fa, #f0f8ff);
            padding: 80px 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .portfolio-card {
            background-color: #ffffff;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }

        .portfolio-card h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #00796b;
            font-weight: bold;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #00bcd4;
        }

        .btn-primary {
            background-color: #00bcd4;
            border-color: #00bcd4;
        }

        .btn-primary:hover {
            background-color: #0097a7;
            border-color: #0097a7;
        }
    </style>

    <div class="portfolio-form-section">
        <div class="portfolio-card">
            <h2>{{ isset($portfolio) ? 'Edit Portfolio' : 'Tambah Portfolio' }}</h2>

            <form 
                action="{{ isset($portfolio) ? route('portfolio.update', $portfolio->id) : route('portfolio.store') }}" 
                method="POST" 
                enctype="multipart/form-data">
                
                @csrf
                @if(isset($portfolio))
                    @method('PUT')
                @endif

                <!-- Judul -->
                <div class="mb-4">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" name="title" id="title" 
                        value="{{ old('title', $portfolio->title ?? '') }}" 
                        class="form-control @error('title') is-invalid @enderror" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" rows="4"
                        class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $portfolio->description ?? '') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gambar -->
                <div class="mb-4">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file" name="image" id="image" 
                        class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if(isset($portfolio) && $portfolio->image)
                        <div class="mt-3">
                            <p>Gambar Lama:</p>
                            <img src="{{ asset('storage/' . $portfolio->image) }}" 
                                alt="Gambar Portfolio" class="img-fluid" style="max-width: 200px;">
                        </div>
                    @endif

                    <div class="preview-container mt-3"></div>
                </div>

                <!-- Submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">
                        {{ isset($portfolio) ? 'Perbarui' : 'Tambah' }} Portfolio
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Preview Gambar Baru -->
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-fluid mt-3';
                    img.style.maxWidth = '200px';

                    const preview = document.querySelector('.preview-container');
                    preview.innerHTML = '';
                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>
