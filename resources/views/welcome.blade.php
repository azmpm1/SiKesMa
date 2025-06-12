<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SiKesMa - Sistem Kesehatan Masyarakat</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 text-gray-800">
        <nav class="bg-[#4a773b] text-white shadow-md">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <div class="text-2xl font-bold">SiKesMa</div>
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#" class="hover:text-gray-300">Ambil Antrian</a>
                    <a href="#" class="hover:text-gray-300">Profil Dokter</a>
                    <a href="#" class="hover:text-gray-300">Ambulance</a>
                    <a href="#" class="hover:text-gray-300">Artikel Kesehatan</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-[#a5e143] text-black font-semibold py-2 px-4 rounded-lg hover:bg-opacity-90">Daftar</a>
                    @endif
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="border border-white py-2 px-4 rounded-lg hover:bg-white hover:text-[#4a773b] transition">Masuk</a>
                    @endif
                </div>
                <div class="md:hidden">
                    <button class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>
            </div>
        </nav>

        <section class="text-white h-[60vh] flex items-center" style="background-image: url('{{ asset('images/image 2.jpg') }}'); background-size: cover; background-position: center;">
            <div class="container mx-auto px-6">
                <div class="max-w-xl">
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">SiKesMa - <br />Sistem Kesehatan Masyarakat</h1>
                    <p class="mt-4 text-lg">“Solusi Kesehatan Digital Terdepan”</p>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="mt-8 inline-block bg-[#4a773b] font-bold py-3 px-6 rounded-lg hover:bg-[#3e6431] transition">
                            Daftar Sebagai Pengguna
                        </a>
                    @endif
                </div>
            </div>
        </section>

        <section class="py-16">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold mb-10">Layanan Publik</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <a href="{{ route('login') }}" class="block bg-[#4a773b] text-white font-bold py-6 px-4 rounded-xl shadow-lg hover:scale-105 transform transition">Ambil Antrian Online</a>
                    <a href="{{ route('login') }}" class="block bg-[#4a773b] text-white font-bold py-6 px-4 rounded-xl shadow-lg hover:scale-105 transform transition">Panggilan Darurat Ambulance</a>
                    <a href="{{ route('login') }}" class="block bg-[#4a773b] text-white font-bold py-6 px-4 rounded-xl shadow-lg hover:scale-105 transform transition">Profil Dokter</a>
                    <a href="{{ route('login') }}" class="block bg-[#4a773b] text-white font-bold py-6 px-4 rounded-xl shadow-lg hover:scale-105 transform transition">Artikel Kesehatan</a>
                </div>
            </div>
        </section>

        <section class="pb-16">
            <div class="container mx-auto text-center px-6">
                <h2 class="text-3xl font-bold mb-10">Artikel Kesehatan</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="{{ asset('images/image 6.png') }}" alt="Artikel 1" class="w-full h-48 object-cover" />
                        <p class="p-4 font-semibold">“Sakit Perut Setelah Makan?” Waspadai Diare Akibat Infeksi</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="{{ asset('images/image 3.png') }}" alt="Artikel 2" class="w-full h-48 object-cover" />
                        <p class="p-4 font-semibold">“Sering Pusing dan Lelah?” Bisa Jadi Hipertensi Tanpa Disadari</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="{{ asset('images/image 4.png') }}" alt="Artikel 3" class="w-full h-48 object-cover" />
                        <p class="p-4 font-semibold">"Demam Tinggi Mendadak?" Jangan Anggap Sepele, Bisa Jadi DBD</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="{{ asset('images/image 5.png') }}" alt="Artikel 4" class="w-full h-48 object-cover" />
                        <p class="p-4 font-semibold">“Gatal Terus di Lipatan Kulit?” Bisa Jadi Infeksi Jamur Kulit!</p>
                    </div>
                </div>
            </div>
        </section>

        <footer class="bg-[#4a773b] text-white text-center py-8">
            <p>&copy; 2025 SiKesMa. Seluruh hak cipta dilindungi.</p>
        </footer>
    </body>
</html>