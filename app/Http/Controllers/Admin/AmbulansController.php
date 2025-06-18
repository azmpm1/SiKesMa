<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PanggilanAmbulans;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon; // Import Carbon
use Illuminate\Support\Facades\DB; // Import DB Facade
use Illuminate\Validation\Rule;

class AmbulansController extends Controller
{
    /**
     * Menampilkan daftar semua data panggilan ambulans beserta grafiknya.
     */
    public function index()
    {
        // --- LOGIKA BARU UNTUK GRAFIK STATISTIK ---
        $stats = PanggilanAmbulans::query()
            ->select(DB::raw('DATE(created_at) as tanggal'), DB::raw('COUNT(*) as jumlah'))
            ->where('created_at', '>=', now()->subDays(6)->toDateString())
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->pluck('jumlah', 'tanggal')
            ->all();

        // Siapkan label dan data untuk 7 hari terakhir
        $chartLabels = [];
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dateString = $date->format('Y-m-d');

            $chartLabels[] = $date->translatedFormat('d M');
            $chartData[] = $stats[$dateString] ?? 0;
        }

        // --- LOGIKA UNTUK TABEL ---
        $panggilanAmbulans = PanggilanAmbulans::latest()->paginate(10);

        // Kirim semua data ke view
        return view('admin.ambulans.index', [
            'panggilanAmbulans' => $panggilanAmbulans,
            'chartLabels' => $chartLabels,
            'chartData' => $chartData,
        ]);
    }

    /**
     * METHOD BARU: Menampilkan formulir untuk mengedit data.
     */
    public function edit(PanggilanAmbulans $panggilanAmbulans)
    {
        return view('admin.ambulans.edit', compact('panggilanAmbulans'));
    }

    /**
     * METHOD BARU: Memperbarui data di database.
     */
    public function update(Request $request, PanggilanAmbulans $panggilanAmbulans)
    {
        $validatedData = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'no_telepon' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
            'keluhan_utama' => ['required', 'string'],
            'riwayat_penyakit' => ['nullable', 'string'],
            'tingkat_urgensi' => ['required', Rule::in(['tinggi', 'sedang', 'rendah'])],
        ]);

        $panggilanAmbulans->update($validatedData);

        return redirect()->route('admin.ambulans.index')
            ->with('success', 'Data panggilan ambulans berhasil diperbarui.');
    }

    /**
     * Menghapus data panggilan ambulans.
     */
    public function destroy(PanggilanAmbulans $panggilanAmbulans)
    {
        $panggilanAmbulans->delete();

        return redirect()->route('admin.ambulans.index')
            ->with('success', 'Data panggilan ambulans berhasil dihapus.');
    }
}
