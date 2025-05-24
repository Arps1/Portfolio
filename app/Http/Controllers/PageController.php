<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PageController extends Controller
{
    public function portfolio()
    {
        // Ambil data portfolio milik user yang sedang login
        $portfolios = Portfolio::where('user_id', auth()->id())->get();

        return view('portfolio.index', compact('portfolios'));
    }
}
