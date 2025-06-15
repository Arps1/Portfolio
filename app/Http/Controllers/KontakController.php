<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class KontakController extends Controller
{
    public function index()
    {
        $pesans = Pesan::with('user')->latest()->paginate(10);

        // Ambil hanya user dengan role admin
        $users = User::where('role', 'admin')->get();

        if (Auth::check() && Auth::user()->role === 'admin') {
            return view('admin.pesan.index', compact('pesans', 'users'));
        } else {
            return view('kontak.index', compact('pesans', 'users'));
        }
    }

    public function kirim(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
            'user_id' => 'nullable|exists:users,id', // opsional (umum atau ke admin)
        ]);

        // Validasi tambahan: pastikan user_id (jika ada) milik admin
        if ($request->filled('user_id')) {
            $user = User::find($request->user_id);
            if ($user->role !== 'admin') {
                return back()->withErrors(['user_id' => 'Pesan hanya dapat dikirim ke pengguna dengan peran admin.']);
            }
        }

        // Simpan pesan
        Pesan::create($validated);

        return redirect()->route('kontak.index')->with('success', 'Pesan berhasil dikirim!');
    }

    public function show($id)
    {
        $pesan = Pesan::with('user')->findOrFail($id);
        return view('admin.pesan.show', compact('pesan'));
    }
}
