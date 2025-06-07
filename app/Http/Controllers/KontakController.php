<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use Illuminate\Support\Facades\Auth;

class KontakController extends Controller
{
    public function index()
    {
        $pesans = Pesan::latest()->paginate(10);

        // Cek apakah user yang login adalah admin
        if (Auth::user()->role === 'admin') {
            return view('admin.pesan.index', compact('pesans'));
            return view('admin.pesan.show', compact('pesans'));
        } else {
            return view('kontak.index', compact('pesans'));
        }
    }

    public function kirim(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
        ]);

        // Simpan ke database
        Pesan::create($validated);

        return redirect()->route('kontak.index')->with('success', 'Pesan berhasil dikirim!');
    }
    public function show($id)
    {
        $pesan = Pesan::findOrFail($id);
        return view('admin.pesan.show', compact('pesan'));
    }
}
