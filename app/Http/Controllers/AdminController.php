<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Antrian;
use App\Models\PanggilanAmbulans;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Data untuk tiga kartu di atas (tidak berubah)
        $jumlahPengguna = User::count();
        $antrianHariIni = Antrian::whereDate('tanggal_periksa', Carbon::today())->count();
        $panggilanAmbulansHariIni = PanggilanAmbulans::whereDate('created_at', Carbon::today())->count();

        // --- LOGIKA BARU UNTUK LOG AKTIVITAS ---

        // 1. Ambil data terbaru dari masing-masing model
        $recentUsers = User::latest()->limit(5)->get();
        $recentAntrians = Antrian::latest()->limit(5)->get();
        $recentAmbulans = PanggilanAmbulans::latest()->limit(5)->get();

        $activities = collect();

        // 2. Format dan gabungkan data menjadi satu koleksi
        foreach ($recentUsers as $user) {
            $activities->push([
                'timestamp' => $user->created_at,
                'message' => "Pengguna \"{$user->name}\" mendaftar."
            ]);
        }
        foreach ($recentAntrians as $antrian) {
            // Karena antrian tidak memiliki nama user, kita gunakan NIK sebagai referensi
            $activities->push([
                'timestamp' => $antrian->created_at,
                'message' => "Antrian baru diambil (NIK: {$antrian->nik})."
            ]);
        }
        foreach ($recentAmbulans as $panggilan) {
            $activities->push([
                'timestamp' => $panggilan->created_at,
                'message' => "Permintaan ambulans oleh \"{$panggilan->nama}\"."
            ]);
        }
        
        // 3. Urutkan semua aktivitas berdasarkan waktu (terbaru di atas) dan ambil 10 teratas
        $sortedActivities = $activities->sortByDesc('timestamp')->take(10);

        return view('admin.dashboard', [
            'jumlahPengguna' => $jumlahPengguna,
            'antrianHariIni' => $antrianHariIni,
            'panggilanAmbulansHariIni' => $panggilanAmbulansHariIni,
            'activities' => $sortedActivities, // Kirim data aktivitas ke view
        ]);
    }
}