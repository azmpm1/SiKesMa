<?php

namespace App\Http\Controllers;

use App\Models\PanggilanAmbulans;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AmbulansController extends Controller
{
    /**
     * Menampilkan formulir panggilan ambulans
     */
    public function create()
    {
        return view('ambulans.create');
    }

    /**
     * Menyimpan data dari formulir dan mengarahkan ke halaman detail (show)
     */
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
        
        $dataToCreate = array_merge($validatedData, ['user_id' => Auth::id()]);

        $panggilan = PanggilanAmbulans::create($dataToCreate);

        // UBAH REDIRECT: Arahkan ke route 'ambulans.show' dengan membawa data panggilan baru
        return redirect()->route('ambulans.show', $panggilan);
    }

    /**
     * METHOD BARU: Menampilkan detail konfirmasi panggilan ambulans
     */
    public function show(PanggilanAmbulans $panggilanAmbulans)
    {
        // Pastikan hanya user yang membuat panggilan yang bisa melihat detailnya
        if ($panggilanAmbulans->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }

        return view('ambulans.show', [
            'panggilan' => $panggilanAmbulans
        ]);
    }
}