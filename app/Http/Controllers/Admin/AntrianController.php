<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon; // Import Carbon
use Illuminate\Support\Facades\DB; // Import DB Facade

class AntrianController extends Controller
{
    /**
     * Menampilkan daftar semua data antrian beserta grafiknya.
     */
    public function index()
    {
        // --- LOGIKA UNTUK GRAFIK STATISTIK ---

        // Ambil statistik antrian 7 hari terakhir
        $stats = Antrian::query()
            ->select(DB::raw('DATE(tanggal_periksa) as tanggal'), DB::raw('COUNT(*) as jumlah'))
            ->where('tanggal_periksa', '>=', now()->subDays(6)->toDateString())
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->pluck('jumlah', 'tanggal')
            ->all();

        // Siapkan label (tanggal) dan data (jumlah) untuk 7 hari
        $chartLabels = [];
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dateString = $date->format('Y-m-d');

            // Format label menjadi "18 Jun"
            $chartLabels[] = $date->translatedFormat('d M');
            $chartData[] = $stats[$dateString] ?? 0;
        }


        // --- LOGIKA UNTUK TABEL (tidak berubah) ---
        $antrians = Antrian::latest()->paginate(10);

        // Kirim semua data yang diperlukan ke view
        return view('admin.antrian.index', [
            'antrians' => $antrians,
            'chartLabels' => $chartLabels,
            'chartData' => $chartData,
        ]);
    }

    /**
     * METHOD BARU: Menampilkan formulir untuk mengedit data antrian.
     */
    public function edit(Antrian $antrian)
    {
        return view('admin.antrian.edit', compact('antrian'));
    }

    /**
     * METHOD BARU: Memperbarui data antrian di database.
     */
    public function update(Request $request, Antrian $antrian)
    {
        $validatedData = $request->validate([
            'nik' => ['required', 'string', 'digits:16'],
            'poli' => ['required', 'string'],
            'keluhan' => ['required', 'string'],
            'tanggal_periksa' => ['required', 'date'],
            'metode_pembayaran' => ['required', 'string'],
        ]);

        $antrian->update($validatedData);

        return redirect()->route('admin.antrian.index')
            ->with('success', 'Data antrian berhasil diperbarui.');
    }

    /**
     * Menghapus data antrian dari database.
     */
    public function destroy(Antrian $antrian)
    {
        $antrian->delete();

        return redirect()->route('admin.antrian.index')
            ->with('success', 'Data antrian berhasil dihapus.');
    }
}
