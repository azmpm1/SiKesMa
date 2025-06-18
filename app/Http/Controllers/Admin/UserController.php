<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Menampilkan daftar semua data pengguna beserta grafiknya.
     */
    public function index()
    {
        // --- LOGIKA UNTUK GRAFIK STATISTIK ---
        $stats = User::query()
            ->select(DB::raw('DATE(created_at) as tanggal'), DB::raw('COUNT(*) as jumlah'))
            ->where('created_at', '>=', now()->subDays(6)->toDateString())
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->pluck('jumlah', 'tanggal')
            ->all();

        // Siapkan label dan data untuk 7 hari terakhir
        $chartLabels = [];
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dateString = $date->format('Y-m-d');

            $chartLabels[] = $date->translatedFormat('d M');
            $chartData[] = $stats[$dateString] ?? 0;
        }

        // --- LOGIKA UNTUK TABEL PENGGUNA ---
        // Ambil semua pengguna kecuali admin yang sedang login
        $users = User::where('id', '!=', Auth::id())->latest()->paginate(10);

        // Kirim semua data ke view
        return view('admin.users.index', [
            'users' => $users,
            'chartLabels' => $chartLabels,
            'chartData' => $chartData,
        ]);
    }

    /**
     * METHOD BARU: Menampilkan formulir untuk mengedit data pengguna.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * METHOD BARU: Memperbarui data pengguna di database.
     */
    public function update(Request $request, User $user)
    {
        // Validasi untuk is_admin dihapus
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'nik' => ['required', 'string', 'digits:16', Rule::unique('users')->ignore($user->id)],
            'no_telp' => ['nullable', 'string', 'max:15'],
            'tanggal_lahir' => ['nullable', 'date'],
            'jenis_kelamin' => ['nullable', 'string'],
            'alamat' => ['nullable', 'string'],
        ]);

        // Logika untuk update is_admin dihapus
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'nik' => $request->nik,
            'no_telp' => $request->no_telp,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Data pengguna berhasil diperbarui.');
    }

    /**
     * Menghapus data pengguna.
     */
    public function destroy(User $user)
    {
        // Tambahan: Pastikan tidak bisa menghapus user admin lain (jika ada lebih dari 1)
        if ($user->isAdmin()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Akun admin tidak dapat dihapus.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }
}
