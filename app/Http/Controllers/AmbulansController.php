<?php

namespace App\Http\Controllers;

use App\Models\PanggilanAmbulans;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AmbulansController extends Controller
{
    // Menampilkan formulir panggilan ambulans
    public function create()
    {
        return view('ambulans.create');
    }

    // Menyimpan data dari formulir
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'no_telepon' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
            'keluhan_utama' => ['required', 'string'],
            'riwayat_penyakit' => ['required', 'string'],
            'tingkat_urgensi' => ['required', Rule::in(['tinggi', 'sedang', 'rendah'])],
        ]);

        PanggilanAmbulans::create($validatedData);

        return redirect()->route('ambulans.success');
    }

    // Menampilkan halaman sukses setelah panggilan terkirim
    public function success()
    {
        return view('ambulans.success');
    }
}