<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'poli',
        'keluhan',
        'tanggal_periksa',
        'metode_pembayaran',
    ];
}