<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        $user = Auth::user();

        // Mengambil data melalui relasi yang sudah dibuat (lebih simpel dan akurat)
        $riwayatAntrian = $user->antrians()->latest('tanggal_periksa')->take(5)->get();
        $riwayatAmbulans = $user->panggilanAmbulans()->latest()->take(5)->get();

        return view('dashboard', compact(
            'riwayatAntrian',
            'riwayatAmbulans'
        ));
    }
}