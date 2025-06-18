<x-app-layout>
    {{-- Slot header dihilangkan agar tidak ada bar abu-abu di bawah navbar --}}

    <div class="px-4 sm:px-10 md:px-20 py-12">
        <div class="max-w-full">

            <div class="mb-8">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name }}!</h1>
                <p class="text-gray-500">Berikut adalah ringkasan aktivitas sistem hari ini.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-white p-6 rounded-2xl shadow-lg flex items-center space-x-5">
                    <div class="p-4 bg-blue-100 rounded-full">
                        <svg class="w-8 h-8 text-blue-800" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />

                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 uppercase">Total Pengguna</h3>
                        <p class="text-3xl font-bold text-gray-800">{{ $jumlahPengguna }}</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-lg flex items-center space-x-5">
                    <div class="p-4 bg-green-100 rounded-full">
                        <svg class="w-8 h-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 uppercase">Antrian Hari Ini</h3>
                        <p class="text-3xl font-bold text-gray-800">{{ $antrianHariIni }}</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-lg flex items-center space-x-5">
                    <div class="p-4 bg-red-100 rounded-full">
                        <svg class="w-8 h-8 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 uppercase">Panggilan Ambulans Hari Ini</h3>
                        <p class="text-3xl font-bold text-gray-800">{{ $panggilanAmbulansHariIni }}</p>
                    </div>
                </div>

            </div>

            <div class="mt-8 bg-white overflow-hidden shadow-lg rounded-2xl">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Aktivitas Terakhir</h3>

                    <div class="space-y-4">
                        @forelse ($activities as $activity)
                            <div class="flex items-start space-x-4">
                                <div class="bg-gray-100 p-2 rounded-full">
                                    @if (Str::contains($activity['message'], 'mendaftar'))
                                        <svg class="w-7 h-7 text-blue-500" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                        </svg>
                                    @elseif(Str::contains($activity['message'], 'ambulans'))
                                        <svg class="w-7 h-7 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0 6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 0 1 4.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 0 0-.38 1.21 12.035 12.035 0 0 0 7.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 0 1 1.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 0 1-2.25 2.25h-2.25Z" />
                                        </svg>
                                    @else
                                        <svg class="w-7 h-7 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                                        </svg>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <p class="text-lg font-medium text-gray-800">{{ $activity['message'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $activity['timestamp']->diffForHumans() }}</p>
                                </div>
                                <span
                                    class="text-sm font-semibold text-gray-400">{{ $activity['timestamp']->format('H:i') }}</span>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <p class="text-gray-500">Belum ada aktivitas terbaru.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
