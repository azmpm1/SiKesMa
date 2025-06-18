<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorProfileController extends Controller
{
    /**
     * Menampilkan halaman profil dokter.
     */
    public function index()
    {
        return view('doctors.index');
    }
}