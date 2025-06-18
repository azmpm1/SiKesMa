<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SiKesMa</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#e6f4ea] text-gray-800">
    <nav class="bg-[#4a773b] text-white shadow-md sticky top-0 z-50">
        <div class="w-full px-20 py-4 flex justify-between items-center">

            <a href="/" class="text-4xl font-bold">SiKesMa</a>

            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('login') }}" class="hover:text-gray-300 text-lg">Ambil Antrian</a>
                <a href="{{ route('login') }}" class="hover:text-gray-300 text-lg">Profil Dokter</a>
                <a href="{{ route('login') }}" class="hover:text-gray-300 text-lg">Ambulance</a>
                <a href="{{ route('login') }}" class="hover:text-gray-300 text-lg">Artikel Kesehatan</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="bg-[#a5e143] text-black text-lg font-medium py-2 px-3 rounded-lg leading-4 hover:bg-[#8fbf38] transition">Daftar</a>
                @endif
                @if (Route::has('login'))
                    <a href="{{ route('login') }}"
                        class="border border-white text-lg font-medium py-2 px-3 rounded-lg leading-4 hover:bg-white hover:text-[#4a773b] transition">Masuk</a>
                @endif
            </div>

            <div class="md:hidden">
                <button class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
    @php
        // Menyiapkan style untuk background agar lebih rapi
        $heroStyle =
            'background-image: url(' .
            asset('images/image_2.jpg') .
            '); background-size: cover; background-position: center;';
    @endphp

    <section class="relative text-black h-[92vh] flex items-center" style="{!! $heroStyle !!}">
        <div class="absolute inset-0"></div>

        <div class="relative w-full px-20">
            <div class="max-w-xl">
                <h1 class="text-6xl md:text-7xl font-bold leading-tight">SiKesMa - <br />Sistem Kesehatan Masyarakat
                </h1>
                <p class="mt-4 text-xl">“Solusi Kesehatan Digital Terdepan”</p>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="mt-8 inline-block bg-[#4a773b] text-xl text-white font-bold py-3 px-6 rounded-xl hover:bg-[#3e6431] transition">
                        Daftar Sebagai Pengguna
                    </a>
                @endif
            </div>
        </div>
    </section>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="mb-16">
                <div class="text-center">
                    <h2 class="text-3xl font-bold mb-10 text-gray-800">Layanan Publik</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <a href="{{ route('login') }}"
                            class="block bg-[#4a773b] text-white font-bold py-8 px-4 rounded-xl shadow-lg hover:bg-green-800 hover:scale-105 transform transition">Ambil
                            Antrian Online</a>
                        <a href="{{ route('login') }}"
                            class="block bg-[#4a773b] text-white font-bold py-8 px-4 rounded-xl shadow-lg hover:bg-green-800 hover:scale-105 transform transition">Panggilan
                            Darurat Ambulance</a>
                        <a href="{{ route('login') }}"
                            class="block bg-[#4a773b] text-white font-bold py-8 px-4 rounded-xl shadow-lg hover:bg-green-800 hover:scale-105 transform transition">Profil
                            Dokter</a>
                        <a href="{{ route('login') }}"
                            class="block bg-[#4a773b] text-white font-bold py-8 px-4 rounded-xl shadow-lg hover:bg-green-800 hover:scale-105 transform transition">Artikel
                            Kesehatan</a>
                    </div>
                </div>
            </section>

            <section>
                <div class="text-center">
                    <h2 class="text-3xl font-bold mb-10 text-gray-800">Artikel Kesehatan</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('images/image_6.png') }}" alt="Artikel 1"
                                class="w-full h-48 object-cover" />
                            <p class="p-4 font-semibold text-gray-700">“Sakit Perut Setelah Makan?” Waspadai Diare
                                Akibat Infeksi</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('images/image_3.png') }}" alt="Artikel 2"
                                class="w-full h-48 object-cover" />
                            <p class="p-4 font-semibold text-gray-700">“Sering Pusing dan Lelah?” Bisa Jadi Hipertensi
                                Tanpa Disadari</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('images/image_4.png') }}" alt="Artikel 3"
                                class="w-full h-48 object-cover" />
                            <p class="p-4 font-semibold text-gray-700">"Demam Tinggi Mendadak?" Jangan Anggap Sepele,
                                Bisa Jadi DBD</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('images/image_5.png') }}" alt="Artikel 4"
                                class="w-full h-48 object-cover" />
                            <p class="p-4 font-semibold text-gray-700">“Gatal Terus di Lipatan Kulit?” Bisa Jadi Infeksi
                                Jamur Kulit!</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>
