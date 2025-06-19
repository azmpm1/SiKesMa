<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanggilanAmbulans extends Model
{
    use HasFactory;

    protected $table = 'panggilan_ambulans';

    protected $fillable = [
        'user_id', // Tambahkan ini
        'nama',
        'no_telepon',
        'alamat',
        'keluhan_utama',
        'riwayat_penyakit',
        'tingkat_urgensi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}