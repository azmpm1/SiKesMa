<x-app-layout :title="__('Dashboard')">
    @php
        // Ganti 'hero-bg.jpg' dengan nama file gambar hero Anda jika berbeda
        $heroStyle = "background-image: url(" . asset('images/image_2.jpg') . "); background-size: cover; background-position: center;";
    @endphp
    <section class="relative text-white h-[94vh] flex items-center" style="{!! $heroStyle !!}">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative w-full px-20 text-white">
            <h1 class="text-6xl md:text-6xl font-bold leading-tight">SiKesMa - <br />Sistem Kesehatan Masyarakat</h1>
            <p class="mt-4 text-xl">“Solusi Kesehatan Digital Terdepan”</p>
        </div>
    </section>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <section class="mb-16">
                <div class="text-center">
                    <h2 class="text-3xl font-bold mb-10 text-gray-800">Layanan Publik</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <a href="#" class="block bg-[#4a773b] text-white font-bold py-8 px-4 rounded-xl shadow-lg hover:bg-green-800 hover:scale-105 transform transition">Ambil Antrian Online</a>
                        <a href="#" class="block bg-[#4a773b] text-white font-bold py-8 px-4 rounded-xl shadow-lg hover:bg-green-800 hover:scale-105 transform transition">Panggilan Darurat Ambulance</a>
                        <a href="#" class="block bg-[#4a773b] text-white font-bold py-8 px-4 rounded-xl shadow-lg hover:bg-green-800 hover:scale-105 transform transition">Profil Dokter</a>
                        <a href="#" class="block bg-[#4a773b] text-white font-bold py-8 px-4 rounded-xl shadow-lg hover:bg-green-800 hover:scale-105 transform transition">Artikel Kesehatan</a>
                    </div>
                </div>
            </section>

            <section>
                <div class="text-center">
                    <h2 class="text-3xl font-bold mb-10 text-gray-800">Artikel Kesehatan</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('images/image_6.png') }}" alt="Artikel 1" class="w-full h-48 object-cover" />
                            <p class="p-4 font-semibold text-gray-700">“Sakit Perut Setelah Makan?” Waspadai Diare Akibat Infeksi</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('images/image_3.png') }}" alt="Artikel 2" class="w-full h-48 object-cover" />
                            <p class="p-4 font-semibold text-gray-700">“Sering Pusing dan Lelah?” Bisa Jadi Hipertensi Tanpa Disadari</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('images/image_4.png') }}" alt="Artikel 3" class="w-full h-48 object-cover" />
                            <p class="p-4 font-semibold text-gray-700">"Demam Tinggi Mendadak?" Jangan Anggap Sepele, Bisa Jadi DBD</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('images/image_5.png') }}" alt="Artikel 4" class="w-full h-48 object-cover" />
                            <p class="p-4 font-semibold text-gray-700">“Gatal Terus di Lipatan Kulit?” Bisa Jadi Infeksi Jamur Kulit!</p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <footer class="bg-[#4a773b] text-white text-center py-20 text-xl">
        <p>&copy; 2025 SiKesMa. Seluruh hak cipta dilindungi.</p>
    </footer>

</x-app-layout>