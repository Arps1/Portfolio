<x-app-layout>
    <div class="py-8 px-4">
        <h2 class="text-2xl font-bold mb-4">Hasil pencarian untuk: "{{ $query }}"</h2>

        @if($results->isEmpty())
            <p class="text-gray-600">Tidak ada hasil yang ditemukan.</p>
        @else
            <div class="grid md:grid-cols-2 gap-4">
                @foreach($results as $portfolio)
                    <div class="p-4 border rounded-md shadow">
                        <h3 class="text-xl font-semibold">{{ $portfolio->title }}</h3>
                        <p class="text-gray-700">{{ Str::limit($portfolio->description, 100) }}</p>
                        <a href="{{ route('portfolio.show', $portfolio->id) }}" class="text-blue-600 mt-2 inline-block">Lihat Detail</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
