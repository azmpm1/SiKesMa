<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; // <-- TAMBAHKAN INI

class Antrian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nik',
        'poli',
        'keluhan',
        'tanggal_periksa',
        'metode_pembayaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * METHOD BARU (ACCESSOR): Untuk menghitung estimasi jam periksa.
     */
    public function getEstimasiJamAttribute(): string
    {
        // Hitung jumlah antrian sebelumnya pada hari dan poli yang sama
        $jumlahAntrianSebelumnya = self::where('tanggal_periksa', $this->tanggal_periksa)
            ->where('poli', $this->poli)
            ->where('id', '<', $this->id)
            ->count();

        // Tentukan durasi per pasien dalam menit
        $durasiPerPasien = 15; 
        
        // Waktu mulai pelayanan
        $waktuBuka = Carbon::createFromFormat('Y-m-d H:i', $this->tanggal_periksa . ' 08:00');

        // Hitung estimasi waktu
        $estimasiJam = $waktuBuka->addMinutes($jumlahAntrianSebelumnya * $durasiPerPasien);

        // Logika untuk jam istirahat (12:00 - 13:00)
        $mulaiIstirahat = Carbon::createFromFormat('Y-m-d H:i', $this->tanggal_periksa . ' 12:00');
        if ($estimasiJam->gte($mulaiIstirahat)) {
            $estimasiJam->addHour(); // Tambah 1 jam jika melewati atau sama dengan jam 12
        }

        // Format jam menjadi "HH:MM"
        return $estimasiJam->format('H:i');
    }
}