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

        Antrian::create($request->all());

        return redirect()->route('dashboard')->with('status', 'Antrian berhasil dibuat!');
    }
}