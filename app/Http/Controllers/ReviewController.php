<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Portfolio;

class ReviewController extends Controller
{

    public function index($id)
    {
    $portfolio = Portfolio::findOrFail($id);
    $reviews = $portfolio->reviews()->with('user')->latest()->get(); // pastikan relasi `reviews` ada di model Portfolio

    return view('reviews.index', compact('portfolio', 'reviews'));
    }
    
    public function store(Request $request, $portfolioId)
    {
    $request->validate([
        'content' => 'required|string|max:1000',
    ]);

    Review::create([
        'user_id' => auth()->id(),
        'portfolio_id' => $portfolioId,
        'content' => $request->content,
    ]);

    return back()->with('success', 'Review berhasil ditambahkan.');
    }
}
