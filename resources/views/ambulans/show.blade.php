<x-app-layout>
    <div class="py-12 px-4 sm:px-10 md:px-20">
        <div class="max-w-2xl mx-auto text-center">

            <h1 class="text-3xl font-bold text-gray-800">Panggilan Terkirim!</h1>
            <p class="text-lg text-gray-600 mt-2 mb-8">Permintaan darurat Anda telah kami terima dan akan segera diproses.</p>

            <div class="bg-white border border-gray-200 rounded-2xl max-w-lg mx-auto p-6 text-left shadow-lg space-y-4">
                
                <div class="flex justify-between items-center pb-4 border-b">
                    <span class="font-semibold text-gray-700">Nomor Panggilan Darurat</span>
                    <span class="font-mono text-lg bg-red-200 text-red-800 font-bold px-3 py-1 rounded-md">{{ $panggilan->id }}</span>
                </div>
                
                <div class="space-y-4 text-md">
                    <div class="flex justify-between">
                        <span class="font-bold text-gray-700">Nama Pasien:</span>
                        <span >{{ $panggilan->nama }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-bold text-gray-700">Tanggal Panggil:</span>
                        <span >{{ $panggilan->created_at->translatedFormat('d F Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-bold text-gray-700">Jam Panggil:</span>
                        <span >{{ $panggilan->created_at->format('H:i') }} WIB</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-gray-700">Tingkat Urgensi:</span>
                        @php
                            $urgensiClass = ($panggilan->tingkat_urgensi == 'tinggi') ? 'bg-red-100 text-red-800' : (($panggilan->tingkat_urgensi == 'sedang') ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800');
                        @endphp
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $urgensiClass }}">
                            {{ ucfirst($panggilan->tingkat_urgensi) }}
                        </span>
                    </div>
                </div>

                <div class="pt-2">
                    <p class="text-sm text-gray-500 mb-1">Keluhan Utama:</p>
                    <p class="text-gray-800 font-medium w-full rounded-md bg-gray-100 p-3 text-sm">{{ $panggilan->keluhan_utama }}</p>
                </div>

                <div class="mt-4 pt-4 border-t border-gray-200">
                    <p class="text-xs text-center text-red-600 font-semibold">
                        Catatan: Tim medis kami akan segera menghubungi Anda di nomor {{ $panggilan->no_telepon }} untuk konfirmasi. Mohon tetap aktifkan telepon Anda.
                    </p>
                </div>
            </div>

            <div class="mt-8 flex justify-center">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-green-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-800 focus:ring-green-500 focus:outline-none">
                    Kembali ke Dashboard
                </a>
            </div>

        </div>
    </div>
</x-app-layout>