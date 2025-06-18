<x-app-layout>
    <div class="py-12 px-4 sm:px-10 md:px-20">
        <div class="max-w-4xl mx-auto">
            
            <a href="{{ route('articles.index') }}" class="inline-flex items-center text-green-700 hover:text-green-900 mb-6">
                <i class="ri-arrow-left-line mr-2"></i>
                Kembali ke Daftar Artikel
            </a>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <img class="w-full h-80 object-cover object-center" src="{{ $article['image'] }}" alt="Gambar Artikel: {{ $article['title'] }}">

                <div class="p-8 md:p-10">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight">
                        {{ $article['title'] }}
                    </h1>
                    
                    <hr class="my-6">

                    <div class="prose max-w-none text-gray-700 leading-relaxed">
                        {!! $article['body'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>