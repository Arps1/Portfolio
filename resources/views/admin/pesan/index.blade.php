<x-app-layout>
    <x-slot name="title">Pesan Masuk</x-slot>

    <div class="container mx-auto py-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Pesan dari Pengguna</h1>
            <a href="{{ url()->current() }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
                Refresh
            </a>
        </div>

        @if($pesans->count())
            <div class="bg-white rounded-lg shadow p-6 overflow-x-auto max-h-[600px]">
                <table class="min-w-full table-auto border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="p-4 border border-gray-300">Nama</th>
                            <th class="p-4 border border-gray-300">Email</th>
                            <th class="p-4 border border-gray-300">Pesan</th>
                            <th class="p-4 border border-gray-300">Dikirim Kepada</th>
                            <th class="p-4 border border-gray-300">Waktu Dikirim</th>
                            <th class="p-4 border border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesans as $pesan)
                            <tr class="border-b border-gray-300">
                                <td class="p-4 border border-gray-300">{{ $pesan->nama }}</td>
                                <td class="p-4 border border-gray-300">{{ $pesan->email }}</td>
                                <td class="p-4 border border-gray-300">{{ Str::limit($pesan->pesan, 50) }}</td>
                                <td class="p-4 border border-gray-300">
                                    {{ $pesan->user->name ?? 'Umum / Semua' }}
                                </td>
                                <td class="p-4 border border-gray-300 text-sm text-gray-500">
                                    {{ $pesan->created_at->format('d M Y H:i') }}
                                </td>
                                <td class="p-4 border border-gray-300">
                                    <a href="{{ route('admin.pesan.show', $pesan->id) }}" class="text-blue-600 hover:underline">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $pesans->links() }}
                </div>
            </div>
        @else
            <p class="text-gray-600">Belum ada pesan masuk.</p>
        @endif
    </div>
</x-app-layout>
