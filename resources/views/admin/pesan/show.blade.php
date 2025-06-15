<x-app-layout>
    <x-slot name="title">Detail Pesan</x-slot>

    <div class="container mx-auto py-10 max-w-3xl">
        <h1 class="text-3xl font-bold mb-8">Detail Pesan dari {{ $pesan->nama }}</h1>

        <div class="bg-white rounded-lg shadow p-8 space-y-6">
            <div>
                <h2 class="font-semibold text-lg mb-1">Nama</h2>
                <p class="text-gray-700">{{ $pesan->nama }}</p>
            </div>

            <div>
                <h2 class="font-semibold text-lg mb-1">Email</h2>
                <p class="text-gray-700">{{ $pesan->email }}</p>
            </div>
            <div>
                <h2 class="font-semibold text-lg mb-1">Dikirim Kepada</h2>
                <p class="text-gray-700">{{ $pesan->user->name ?? 'Semua / Umum' }}</p>
            </div>
            <div>
                <h2 class="font-semibold text-lg mb-1">Pesan</h2>
                <p class="whitespace-pre-line text-gray-800 leading-relaxed break-words max-w-full overflow-x-auto">
                    {{ $pesan->pesan }}
                </p>
            </div>

            <div>
                <h2 class="font-semibold text-lg mb-1">Waktu Dikirim</h2>
                <p class="text-gray-600">{{ $pesan->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('admin.pesan.index') }}" 
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-3 rounded shadow">
               Kembali ke Daftar Pesan
            </a>
        </div>
    </div>
</x-app-layout>
