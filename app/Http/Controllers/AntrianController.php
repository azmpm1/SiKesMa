<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AntrianController extends Controller
{
    /**
     * METHOD YANG HILANG: Menampilkan formulir untuk membuat antrian.
     */
    public function create()
    {
        return view('antrian.create');
    }

    /**
     * Menyimpan data antrian baru.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => ['required', 'string', 'digits:16'],
            'poli' => ['required', 'string'],
            'keluhan' => ['required', 'string'],
            'tanggal_periksa' => ['required', 'date'],
            'metode_pembayaran' => ['required', 'string'],
        ]);

        // --- LOGIKA BARU UNTUK NOMOR ANTRIAN HARIAN ---
        // 1. Hitung berapa antrian yang sudah ada pada hari dan poli yang sama
        $jumlahAntrianSaatIni = Antrian::where('tanggal_periksa', $validatedData['tanggal_periksa'])
            ->where('poli', $validatedData['poli'])
            ->count();

        // 2. Nomor antrian baru adalah jumlah saat ini + 1
        $nomorBaru = $jumlahAntrianSaatIni + 1;

        // 3. Siapkan data untuk disimpan
        $dataToCreate = array_merge($validatedData, [
            'user_id' => Auth::id(),
            'nomor_antrian_harian' => $nomorBaru
        ]);

        $antrian = Antrian::create($dataToCreate);

        return redirect()->route('antrian.show', $antrian);
    }


    /**
     * Menampilkan detail tiket antrian.
     */

    public function show(Antrian $antrian)
    {
        // =======================================================
        // BLOK KODE UNTUK KEAMANAN (SUDAH ADA)
        // =======================================================
        // Pastikan hanya user yang membuat antrian ATAU admin yang bisa melihat detailnya
        if (Auth::id() !== $antrian->user_id && !Auth::user()->isAdmin()) {
            abort(403, 'AKSES DITOLAK');
        }
        // =======================================================

        // --- Logika untuk estimasi jam ---
        $jumlahAntrianSebelumnya = Antrian::where('tanggal_periksa', $antrian->tanggal_periksa)
            ->where('poli', $antrian->poli)
            ->where('id', '<', $antrian->id)
            ->count();

        $durasiPerPasien = 15;
        $waktuBuka = Carbon::createFromFormat('Y-m-d H:i', $antrian->tanggal_periksa . ' 08:00');
        $estimasiJam = $waktuBuka->addMinutes($jumlahAntrianSebelumnya * $durasiPerPasien);

        $mulaiIstirahat = Carbon::createFromFormat('Y-m-d H:i', $antrian->tanggal_periksa . ' 12:00');
        if ($estimasiJam->gte($mulaiIstirahat)) {
            $estimasiJam->addHour();
        }

        $jam = $estimasiJam->format('H:i');

        return view('antrian.show', [
            'antrian' => $antrian,
            'jam' => $jam
        ]);
    }
}
