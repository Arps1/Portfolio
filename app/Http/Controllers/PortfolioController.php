<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Portfolio;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Import trait ini

class PortfolioController extends Controller
{
    use AuthorizesRequests;
    public function index() {
        $portfolios = Auth::user()->role == 'admin'
            ? Portfolio::all()
            : Portfolio::where('user_id', Auth::id())->get();
    
        return view('portfolio.index', compact('portfolios'));
    }
    
    public function create() {
        $this->authorize('create', Portfolio::class);
        return view('portfolio.create');
    }
    
    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|nullable',
            'link' => 'nullable|url',
        ]);
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
    
        $data['user_id'] = Auth::id();
        Portfolio::create($data);
        return redirect()->route('portfolio.index')->with('success', 'Portfolio berhasil ditambahkan');
    }
    
    public function edit(Portfolio $portfolio) {
        $this->authorize('update', $portfolio);
        return view('portfolio.edit', compact('portfolio'));
    }
    
    public function update(Request $request, Portfolio $portfolio) {
        $this->authorize('update', $portfolio);
    
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|nullable',
            'link' => 'nullable|url',
        ]);
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
    
        $portfolio->update($data);
        return redirect()->route('portfolio.index')->with('success', 'Portfolio berhasil diperbarui');
    }
    
    public function destroy(Portfolio $portfolio) {
        $this->authorize('delete', $portfolio);
        $portfolio->delete();
        return redirect()->route('portfolio.index')->with('success', 'Portfolio berhasil dihapus');
    }
    public function show($id)
    {
        // Mengambil portofolio berdasarkan ID
        $portfolio = Portfolio::findOrFail($id);

        // Mengirim data portofolio ke view
        return view('portfolio.show', compact('portfolio'));
    }
    public function userPortfolio()
    {
        // Mengambil semua portofolio tanpa filter user_id
        $portfolios = Portfolio::all(); 
    
        // Mengirimkan data portofolio ke view
        return view('portfolio.user-index', compact('portfolios'));
    }
    

}
