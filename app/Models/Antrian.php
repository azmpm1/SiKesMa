<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Antrian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nomor_antrian_harian', // <-- TAMBAHKAN INI
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
     * Accessor untuk menghitung estimasi jam periksa.
     * LOGIKANYA KITA PERBARUI DI SINI
     */
    public function getEstimasiJamAttribute(): string
    {
        // Jumlah antrian sebelumnya adalah nomor harian dikurangi 1
        $jumlahAntrianSebelumnya = $this->nomor_antrian_harian - 1;

        $durasiPerPasien = 15; 
        $waktuBuka = Carbon::createFromFormat('Y-m-d H:i', $this->tanggal_periksa . ' 08:00');
        $estimasiJam = $waktuBuka->addMinutes($jumlahAntrianSebelumnya * $durasiPerPasien);

        $mulaiIstirahat = Carbon::createFromFormat('Y-m-d H:i', $this->tanggal_periksa . ' 12:00');
        if ($estimasiJam->gte($mulaiIstirahat)) {
            $estimasiJam->addHour();
        }

        return $estimasiJam->format('H:i');
    }
}