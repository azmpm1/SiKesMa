<x-app-layout>
    <div class="py-12 px-4 sm:px-10 md:px-20">
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800">Profil Dokter Kami</h1>
            <p class="text-gray-500 mt-2">Temui tim dokter profesional yang siap melayani Anda.</p>
        </div>

        @php
        // Data dokter sementara (nantinya bisa dari database)
        $doctors = [
            [
                'name' => 'drg. Adrian Wibowo, Sp.Ort',
                'specialty' => 'Dokter Spesialis Gigi',
                'image' => '/images/doctor_1.png', // Ganti dengan path gambar Anda
                'schedule' => [
                    'Senin: 09.00 - 17.00 WIB',
                    'Kamis: 14.00 - 20.00 WIB',
                    'Jumat: 09.00 - 17.00 WIB',
                ]
            ],
            [
                'name' => 'dr. Amanda Setiadi, Sp.A(K)',
                'specialty' => 'Dokter Spesialis Anak',
                'image' => '/images/doctor_2.png',
                'schedule' => [
                    'Selasa: 10.00 - 18.00 WIB',
                    'Rabu: 09.00 - 12.00 WIB',
                    'Jumat: 16.00 - 19.00 WIB',
                ]
            ],
            [
                'name' => 'dr. Michael Tanuwijaya',
                'specialty' => 'Dokter Umum',
                'image' => '/images/doctor_3.png',
                'schedule' => [
                    'Senin - Jumat: 08.00 - 16.00 WIB',
                ]
            ],
            [
                'name' => 'dr. Anindita Putri, M.Kes',
                'specialty' => 'Dokter Umum',
                'image' => '/images/doctor_4.png',
                'schedule' => [
                    'Selasa: 16.00 - 19.00 WIB',
                    'Kamis: 08.00 - 12.00 WIB',
                    'Sabtu: 08.00 - 13.00 WIB',
                ]
            ],
            [
                'name' => 'dr. Farhan Ali, Sp.A(K)',
                'specialty' => 'Dokter Spesialis Anak',
                'image' => '/images/doctor_5.png',
                'schedule' => [
                    'Selasa: 18.00 - 19.00 WIB',
                    'Kamis: 09.00 - 11.00 WIB',
                    'Sabtu: 09.00 - 13.00 WIB',
                ]
            ],
            [
                'name' => 'dr. Aisyah Rahmawati, Sp.A',
                'specialty' => 'Dokter Umum',
                'image' => '/images/doctor_6.png',
                'schedule' => [
                    'Senin: 18.00 - 21.00 WIB',
                    'Rabu: 18.00 - 21.00 WIB',
                    'Kamis: 18.00 - 21.00 WIB',
                ]
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($doctors as $doctor)
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                    <img class="w-full h-64 object-cover object-center" src="{{ $doctor['image'] }}" alt="Foto {{ $doctor['name'] }}">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900">{{ $doctor['name'] }}</h3>
                        <p class="text-sm text-green-700 font-semibold mt-1">{{ $doctor['specialty'] }}</p>

                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <h4 class="font-semibold text-gray-600">Jadwal Praktik:</h4>
                            <ul class="mt-2 space-y-1 text-sm text-gray-500">
                                @foreach ($doctor['schedule'] as $item)
                                    <li class="flex items-center">
                                        <i class="ri-time-line mr-2 text-green-600"></i>
                                        <span>{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>