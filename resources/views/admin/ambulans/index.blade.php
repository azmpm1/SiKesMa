<x-app-layout>
    <div class="py-12 px-4 sm:px-10 md:px-20">

        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">{{ __('Kelola Panggilan Ambulans') }}</h1>
            <p class="text-gray-500">Lihat dan kelola seluruh data panggilan ambulans yang tersimpan dalam sistem.</p>
        </div>

        <div class="mb-8 bg-white overflow-hidden shadow-lg sm:rounded-2xl">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Statistik Panggilan (7 Hari Terakhir)</h3>
                    <button id="downloadChartBtn" class="px-5 py-3 bg-green-600 text-white text-sm font-semibold rounded-lg hover:bg-green-800">
                        <i class="ri-download-2-line mr-2"></i>Download
                    </button>
                </div>
                <div class="relative" style="height: 320px;">
                    <canvas id="ambulansChart"></canvas>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-5" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-lg sm:rounded-2xl">
            <div class="p-6 text-gray-900">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Daftar Semua Panggilan Ambulans</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        {{-- ... Isi tabel tidak berubah ... --}}
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Telepon</th>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keluhan</th>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Riwayat Penyakit</th>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Urgensi</th>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($panggilanAmbulans as $index => $panggilan)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-6 whitespace-nowrap">{{ $panggilanAmbulans->firstItem() + $index }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap">{{ $panggilan->nama }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap">{{ $panggilan->no_telepon }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap">{{ $panggilan->alamat }}</td>
                                    <td class="py-4 px-6 max-w-xs truncate">{{ $panggilan->keluhan_utama }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap">{{ $panggilan->riwayat_penyakit }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap">
                                        @php
                                            $urgensiClass = '';
                                            if ($panggilan->tingkat_urgensi == 'tinggi') {
                                                $urgensiClass = 'bg-red-100 text-red-800';
                                            } elseif ($panggilan->tingkat_urgensi == 'sedang') {
                                                $urgensiClass = 'bg-yellow-100 text-yellow-800';
                                            } else {
                                                $urgensiClass = 'bg-blue-100 text-blue-800';
                                            }
                                        @endphp
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $urgensiClass }}">
                                            {{ ucfirst($panggilan->tingkat_urgensi) }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap flex items-center space-x-2">
                                        <a href="{{ route('admin.ambulans.edit', $panggilan->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded-md text-xs hover:bg-blue-600 shadow">Edit</a>
                                        <form action="{{ route('admin.ambulans.destroy', $panggilan->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md text-xs hover:bg-red-600 shadow">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-8 text-gray-500">Tidak ada data panggilan ambulans.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-6">
            {{ $panggilanAmbulans->links() }}
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('ambulansChart').getContext('2d');
                const ambulansChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($chartLabels),
                        datasets: [{
                            label: 'Jumlah Panggilan',
                            data: @json($chartData),
                            backgroundColor: 'rgba(220, 38, 38, 0.6)', // Warna merah
                            borderColor: 'rgba(220, 38, 38, 1)',
                            borderWidth: 1,
                            borderRadius: 5,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });

                // Fungsionalitas Tombol Download
                document.getElementById('downloadChartBtn').addEventListener('click', function() {
                    const canvas = ambulansChart.canvas;
                    const ctx = canvas.getContext('2d');
                    ctx.save();
                    ctx.globalCompositeOperation = 'destination-over';
                    ctx.fillStyle = 'white';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                    const url = ambulansChart.toBase64Image();
                    ctx.restore();
                    
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'statistik-ambulans-sikesma.png';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                });
            });
        </script>
    @endpush
</x-app-layout>