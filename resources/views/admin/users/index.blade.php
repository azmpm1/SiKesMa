<x-app-layout>
    <div class="py-12 px-4 sm:px-10 md:px-20">

        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">{{ __('Kelola Data Pengguna') }}</h1>
            <p class="text-gray-500">Lihat dan kelola seluruh data pengguna yang tersimpan dalam sistem.</p>
        </div>

        <div class="mb-8 bg-white overflow-hidden shadow-lg sm:rounded-2xl">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Statistik Pendaftaran (7 Hari Terakhir)</h3>
                    <button id="downloadChartBtn" class="px-5 py-3 bg-green-600 text-white text-sm font-semibold rounded-lg hover:bg-green-800">
                        <i class="ri-download-2-line mr-2"></i>Download
                    </button>
                </div>
                <div class="relative" style="height: 320px;">
                    <canvas id="userChart"></canvas>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-5" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @elseif (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-5" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-lg sm:rounded-2xl">
            <div class="p-6 text-gray-900">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Daftar Semua Pengguna</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Telp</th>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</th>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                                <th class="py-4 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($users as $index => $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-6 whitespace-nowrap">{{ $users->firstItem() + $index }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap font-medium text-gray-900">{{ $user->name }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap">{{ $user->email }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap">{{ $user->nik }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap">{{ $user->no_telp }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap">{{ $user->jenis_kelamin }}</td>
                                    <td class="py-4 px-6 max-w-sm truncate" title="{{ $user->alamat }}">{{ Str::limit($user->alamat, 35) }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap flex items-center space-x-2">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded-md text-xs hover:bg-blue-600 shadow">Edit</a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus pengguna ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md text-xs hover:bg-red-600 shadow">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-8 text-gray-500">Tidak ada data pengguna.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // ... (kode javascript untuk chart tidak perlu diubah) ...
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('userChart').getContext('2d');
                const userChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($chartLabels),
                        datasets: [{
                            label: 'Jumlah Pendaftar Baru',
                            data: @json($chartData),
                            backgroundColor: 'rgba(59, 130, 246, 0.6)', // Warna biru
                            borderColor: 'rgba(59, 130, 246, 1)',
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
                    const canvas = userChart.canvas;
                    const ctx = canvas.getContext('2d');
                    ctx.save();
                    ctx.globalCompositeOperation = 'destination-over';
                    ctx.fillStyle = 'white';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                    const url = userChart.toBase64Image();
                    ctx.restore();
                    
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'statistik-pengguna-sikesma.png';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                });
            });
        </script>
    @endpush
</x-app-layout>