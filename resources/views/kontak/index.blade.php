<x-app-layout>
    <x-slot name="title">Kontak Saya</x-slot>

    <style>
        .kontak-section {
            background: linear-gradient(135deg, #e0f7fa, #f0f8ff);
            padding: 80px 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .kontak-card {
            background-color: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }

        .kontak-card h1 {
            color: #00796b;
            font-weight: bold;
            margin-bottom: 20px;
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

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px 20px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>

    <div class="kontak-section">
        <div class="kontak-card">
            <h1>Hubungi Saya</h1>

            @if (session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('kontak.kirim') }}">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama lengkap Anda" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="contoh@email.com" required>
                </div>

                <div class="mb-3">
                    <label for="user_id" class="form-label">Kirim Pesan Kepada</label>
                    <select class="form-control" id="user_id" name="user_id">
                        <option value="">-- Kirim ke Umum --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Tulis pesan Anda..." required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
