<x-app-layout>
    <div class="py-12 px-4 sm:px-10 md:px-20">
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Selamat Datang Kembali, {{ Auth::user()->name }}!
            </h1>
            <p class="text-gray-500">Berikut adalah ringkasan aktivitas kesehatan Anda.</p>
        </div>

        <div class="bg-white overflow-hidden shadow-lg sm:rounded-2xl">
            <div class="p-6 text-gray-900">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Riwayat Antrian Terakhir</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">No. Antrian
                                </th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Poli</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Tgl Periksa
                                </th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Jam</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Keluhan</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($riwayatAntrian as $antrian)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 font-bold">{{ $antrian->id }}</td>
                                    <td class="py-3 px-4">{{ $antrian->poli }}</td>
                                    <td class="py-3 px-4">
                                        {{ \Carbon\Carbon::parse($antrian->tanggal_periksa)->translatedFormat('d M Y') }}
                                    </td>
                                    <td class="py-3 px-4">{{ $antrian->estimasi_jam }} WIB</td>
                                    <td class="py-3 px-4 text-sm text-gray-600">{{ Str::limit($antrian->keluhan, 40) }}
                                    </td>
                                    <td class="py-3 px-4">
                                        <a href="{{ route('antrian.show', $antrian->id) }}"
                                            class="px-3 py-1 bg-green-500 text-white rounded-md text-sm hover:bg-green-600">
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-6 text-gray-500">Belum ada riwayat antrian.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white overflow-hidden shadow-lg sm:rounded-2xl">
            <div class="p-6 text-gray-900">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Riwayat Panggilan Ambulans</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Tgl
                                    Panggilan</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Jam</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Keluhan</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Tingkat
                                    Urgensi</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($riwayatAmbulans as $panggilan)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 font-bold">{{ $panggilan->id }}</td>
                                    <td class="py-3 px-4">{{ $panggilan->created_at->translatedFormat('d M Y, H:i') }}
                                    </td>
                                    <td class="py-3 px-4">{{ $panggilan->created_at->format('H:i') }} WIB</td>
                                    <td class="py-3 px-4 text-sm text-gray-600">
                                        {{ Str::limit($panggilan->keluhan_utama, 50) }}</td>
                                    <td class="py-3 px-4">
                                        @php
                                            $urgensiClass =
                                                $panggilan->tingkat_urgensi == 'tinggi'
                                                    ? 'bg-red-100 text-red-800'
                                                    : ($panggilan->tingkat_urgensi == 'sedang'
                                                        ? 'bg-yellow-100 text-yellow-800'
                                                        : 'bg-blue-100 text-blue-800');
                                        @endphp
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $urgensiClass }}">
                                            {{ ucfirst($panggilan->tingkat_urgensi) }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <a href="{{ route('ambulans.show', $panggilan->id) }}"
                                            class="px-3 py-1 bg-red-500 text-white rounded-md text-sm hover:bg-red-600">
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-6 text-gray-500">Belum ada riwayat
                                        panggilan ambulans.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
