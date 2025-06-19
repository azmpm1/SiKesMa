<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SiKesMa</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
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
        </div>
    </nav>

    @php
        $heroStyle = 'background-image: url(' . asset('images/image_2.jpg') . '); background-size: cover; background-position: center;';
    @endphp

    <section class="relative text-black h-[92vh] flex items-center" style="{!! $heroStyle !!}">
        <div class="absolute inset-0"></div>

        <div class="relative w-full px-20">
            <div class="max-w-xl">
                <h1 class="text-6xl md:text-7xl font-bold leading-tight">SiKesMa - <br />Sistem Kesehatan Masyarakat</h1>
                <p class="mt-4 text-xl">Solusi layanan kesehatan masyarakat secara online dan efisien, tanpa antre panjang.</p>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="mt-8 inline-block bg-[#4a773b] text-xl text-white font-bold py-3 px-6 rounded-xl hover:bg-[#3e6431] transition">
                        Daftar Sekarang
                    </a>
                @endif
            </div>
        </div>
    </section>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Kenapa Memilih SiKesMa?</h2>
                <p class="mt-4 text-lg text-gray-600">Berikut fitur-fitur unggulan yang dapat Anda manfaatkan</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-[#e6f4ea] rounded-xl shadow-lg p-6 text-center">
                    <box-icon name='edit-alt' type='solid' color='#4a773b' size='lg'></box-icon>
                    <h3 class="text-xl font-semibold mt-4 mb-2">Ambil Antrian Online</h3>
                    <p class="text-gray-700">Cegah antrean panjang dengan reservasi antrian dari rumah.</p>
                </div>
                <div class="bg-[#e6f4ea] rounded-xl shadow-lg p-6 text-center">
                    <box-icon name='ambulance' type='solid' color='#4a773b' size='lg'></box-icon>
                    <h3 class="text-xl font-semibold mt-4 mb-2">Panggilan Ambulans</h3>
                    <p class="text-gray-700">Layanan darurat cepat hanya dalam beberapa klik.</p>
                </div>
                <div class="bg-[#e6f4ea] rounded-xl shadow-lg p-6 text-center">
                    <box-icon name='user' type='solid' color='#4a773b' size='lg'></box-icon>
                    <h3 class="text-xl font-semibold mt-4 mb-2">Profil Dokter</h3>
                    <p class="text-gray-700">Lihat informasi dokter yang tersedia dan keahliannya.</p>
                </div>
                <div class="bg-[#e6f4ea] rounded-xl shadow-lg p-6 text-center">
                    <box-icon name='book' type='solid' color='#4a773b' size='lg'></box-icon>
                    <h3 class="text-xl font-semibold mt-4 mb-2">Artikel Kesehatan</h3>
                    <p class="text-gray-700">Dapatkan edukasi dan informasi medis terpercaya.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-20 bg-[#e6f4ea]">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-10">Apa Kata Mereka?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white shadow-lg rounded-xl p-6">
                    <p class="text-gray-700 italic">“Pelayanannya cepat dan sistemnya sangat membantu. Tidak perlu antre lama lagi.”</p>
                    <div class="mt-4 font-semibold">Budi, Nganjuk</div>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <p class="text-gray-700 italic">“Saya merasa lebih aman karena bisa memanggil ambulans hanya dengan beberapa klik.”</p>
                    <div class="mt-4 font-semibold">Siti, Kertosono</div>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <p class="text-gray-700 italic">“Sangat membantu, terutama bagi lansia. Semoga terus dikembangkan.”</p>
                    <div class="mt-4 font-semibold">Pak Rudi, Pace</div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-[#4a773b] text-white py-10">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-2xl font-bold">SiKesMa - Sistem Kesehatan Masyarakat</h3>
            <p class="mt-2">Aplikasi pelayanan kesehatan berbasis digital untuk mempermudah akses masyarakat terhadap layanan kesehatan.</p>
            <p class="mt-2 text-sm">&copy; 2025 SiKesMa. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
