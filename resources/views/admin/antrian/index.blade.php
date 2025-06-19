<x-app-layout>
    <div class="py-12 px-4 sm:px-10 md:px-20">

        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">{{ __('Kelola Data Antrian') }}</h1>
            <p class="text-gray-500">Lihat dan kelola seluruh data antrian yang tersimpan dalam sistem.</p>
        </div>

        <div class="mb-8 bg-white overflow-hidden shadow-lg sm:rounded-2xl">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Statistik Antrian (7 Hari Terakhir)</h3>
                    <button id="downloadChartBtn" class="px-5 py-3 bg-green-600 text-white text-sm font-semibold rounded-lg hover:bg-green-800">
                        <i class="ri-download-2-line mr-2"></i>Download
                    </button>
                </div>

                <div class="relative" style="height: 320px;">
                    <canvas id="antrianChart"></canvas>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-5"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-lg sm:rounded-2xl">
            <div class="p-6 text-gray-900">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Daftar Semua Antrian</h3>
                <div class="overflow-x-auto">
                    {{-- ... Isi tabel tidak berubah ... --}}
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No.</th>
                                <th
                                    class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    NIK</th>
                                <th
                                    class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Poli</th>
                                <th
                                    class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Keluhan</th>
                                <th
                                    class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tgl Periksa</th>
                                <th
                                    class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pembayaran</th>
                                <th
                                    class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($antrians as $index => $antrian)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-6 whitespace-nowrap">{{ $antrians->firstItem() + $index }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap">{{ $antrian->nik }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap">{{ $antrian->poli }}</td>
                                    <td class="py-4 px-6 max-w-xs truncate">{{ $antrian->keluhan }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($antrian->tanggal_periksa)->format('d M Y') }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $antrian->metode_pembayaran == 'BPJS' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $antrian->metode_pembayaran }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap flex items-center space-x-2">
                                        <a href="{{ route('admin.antrian.edit', $antrian->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded-md text-sm hover:bg-blue-600 shadow">Edit</a>
                                        <form action="{{ route('admin.antrian.destroy', $antrian->id) }}" method="POST"
                                            onsubmit="return confirm('Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 bg-red-500 text-white rounded-md text-sm hover:bg-red-600 shadow">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-8 text-gray-500">Tidak ada data antrian.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-6">
            {{ $antrians->links() }}
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('antrianChart').getContext('2d');
                const antrianChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($chartLabels),
                        datasets: [{
                            label: 'Jumlah Antrian',
                            data: @json($chartData),
                            backgroundColor: 'rgba(74, 119, 59, 0.6)',
                            borderColor: 'rgba(74, 119, 59, 1)',
                            borderWidth: 1,
                            borderRadius: 5,
                        }]
                    },
                    options: {
                        responsive: true,
                        // LANGKAH 2: Matikan maintainAspectRatio
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

                // Fungsionalitas Tombol Download yang Sudah Diperbaiki
                document.getElementById('downloadChartBtn').addEventListener('click', function() {
                    const canvas = antrianChart.canvas;
                    const ctx = canvas.getContext('2d');

                    // Simpan keadaan kanvas saat ini
                    ctx.save();

                    // Atur agar gambar baru ditaruh di BELAKANG grafik yang sudah ada
                    ctx.globalCompositeOperation = 'destination-over';

                    // Gambar sebuah kotak persegi berwarna putih sebagai latar belakang
                    ctx.fillStyle = 'white';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);

                    // Dapatkan URL gambar yang sekarang sudah memiliki latar belakang
                    const url = antrianChart.toBase64Image();

                    // Kembalikan keadaan kanvas seperti semula
                    ctx.restore();

                    // Proses download seperti biasa
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'statistik-antrian-sikesma.png';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                });
            });
        </script>
    @endpush
</x-app-layout>
