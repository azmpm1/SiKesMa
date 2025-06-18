<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('antrian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'string', 'digits:16'],
            'poli' => ['required', 'string'],
            'keluhan' => ['required', 'string'],
            'tanggal_periksa' => ['required', 'date'],
            'metode_pembayaran' => ['required', 'string'],
        ]);

        $antrian = Antrian::create($request->all());

        // Alihkan ke route 'antrian.show' dengan membawa ID antrian baru
        return redirect()->route('antrian.show', $antrian);
    }

    /**
     * Display the specified resource.
     */
    public function show(Antrian $antrian)
    {
        // Logika untuk menentukan jam, untuk sementara kita buat acak
        // Di aplikasi nyata, ini bisa lebih kompleks (misal: berdasarkan jumlah antrian)
        $jam = '09:' . str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);

        return view('antrian.show', [
            'antrian' => $antrian,
            'jam' => $jam
        ]);
    }
}