<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#e6f4ea]">
                <div class="p-6 md:p-12 text-gray-900 text-center">

                    <h1 class="text-3xl font-bold text-gray-800">Selamat!</h1>
                    <p class="text-lg text-gray-600 mt-2 mb-8">Antrian Anda Berhasil Ditambahkan</p>

                    {{-- Card Tiket Antrian dengan gaya Tailwind --}}
                    <div class="bg-gray-50 rounded-2xl max-w-md mx-auto p-6 text-left shadow-lg">
                        
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-gray-700">Nomor Antrian</span>
                                <span class="font-mono text-lg bg-green-200 text-green-800 font-bold px-3 py-1 rounded-md">{{ $antrian->id }}</span>
                            </div>
                            
                            <hr>

                            <div class="flex justify-between items-center">
                                <span class="font-bold text-gray-700">Poli</span>
                                <span>{{ $antrian->poli }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-gray-700">Tanggal Periksa</span>
                                <span>{{ \Carbon\Carbon::parse($antrian->tanggal_periksa)->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-gray-700">Perkiraan Jam</span>
                                <span>{{ $jam }} WIB</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-gray-700">Metode Pembayaran</span>
                                <span>{{ $antrian->metode_pembayaran }}</span>
                            </div>

                            <div class="pt-2">
                                <span class="font-bold text-gray-700 block mb-1">Keluhan</span>
                                <p class="text-gray-800 bg-gray-200 p-3 rounded-md">{{ $antrian->keluhan }}</p>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-gray-300">
                            <p class="text-sm text-gray-600">
                                <span class="font-bold">Catatan:</span> Silahkan datang 15 menit sebelum waktu yang ditentukan dan bawa dokumen yang diperlukan.
                            </p>
                        </div>
                    </div>

                    {{-- Tombol Kembali --}}
                    <div class="mt-8 flex justify-center">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-green-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-800 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Kembali ke Dashboard
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>