<x-app-layout>
    <x-slot name="title">Edit Portfolio</x-slot>

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
            background-color: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }

        .portfolio-card h2 {
            color: #00796b;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
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
            <h2>Edit Portfolio</h2>

            <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Judul -->
                <div class="mb-4">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $portfolio->title) }}" class="form-control @error('title') is-invalid @enderror" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" required>{{ old('description', $portfolio->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gambar -->
                <div class="mb-4">
                    <label for="image" class="form-label">Unggah Gambar</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if($portfolio->image)
                        <div class="mt-3">
                            <p>Gambar Lama:</p>
                            <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Portfolio Image" class="img-fluid" style="max-width: 200px;">
                            <small class="text-muted d-block mt-2">* Pilih gambar baru untuk mengganti.</small>
                        </div>
                    @endif

                    <div class="preview-container mt-3"></div>
                </div>

                <!-- File -->
                <div class="mb-4">
                    <label for="file" class="form-label">Unggah File</label>
                    <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror">
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if($portfolio->file)
                        <div class="mt-3">
                            <a href="{{ asset('storage/' . $portfolio->file) }}" target="_blank" class="btn btn-primary">File Lama</a>
                        </div>
                    @endif
                </div>

                <!-- Link -->
                <div class="mb-4">
                    <label for="link" class="form-label">Link Proyek (Opsional)</label>
                    <input type="url" name="link" id="link" value="{{ old('link', $portfolio->link) }}" class="form-control @error('link') is-invalid @enderror" placeholder="https://contoh.com">
                    @error('link')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Perbarui Portfolio</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Preview Gambar Baru -->
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.querySelector('.preview-container');
            previewContainer.innerHTML = '';

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result;
                    imgElement.classList.add('img-fluid', 'mt-3');
                    imgElement.style.maxWidth = '200px';
                    previewContainer.appendChild(imgElement);
                };
                reader.readAsDataURL(file);
            } else if (file) {
                const text = document.createElement('p');
                text.innerText = `File siap diunggah: ${file.name}`;
                previewContainer.appendChild(text);
            }
        });
    </script>
</x-app-layout>
