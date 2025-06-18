<x-app-layout>
    <div class="py-12 px-4 sm:px-10 md:px-20">
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800">Artikel Kesehatan</h1>
            <p class="text-gray-500 mt-2">Wawasan dan informasi terbaru seputar dunia kesehatan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($articles as $article)
                <a href="{{ route('articles.show', $article['slug']) }}" class="group block bg-white rounded-2xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="relative">
                        <img class="w-full h-64 object-cover object-center" src="{{ $article['image'] }}" alt="Gambar Artikel: {{ $article['title'] }}">
                        <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-40 transition-all duration-300"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-900 leading-snug group-hover:text-green-700 transition-colors duration-300">{{ $article['title'] }}</h3>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>