<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak'); // resources/views/kontak.blade.php
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
}
