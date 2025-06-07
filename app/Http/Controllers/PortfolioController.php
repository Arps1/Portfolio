<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PortfolioController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $portfolios = Auth::user()->role == 'admin'
            ? Portfolio::all()
            : Portfolio::where('user_id', Auth::id())->get();

        return view('portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        $this->authorize('create', Portfolio::class);
        return view('portfolio.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'file' => 'nullable|file|mimes:html,yaml,php,js,py,pdf,png,jpeg,jpg,mysql,doc,docx,xls,xlsx,ppt,pptx,txt|max:10240',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('files', 'public');
        }

        $data['user_id'] = Auth::id();

        Portfolio::create($data);

        return redirect()->route('portfolio.index')->with('success', 'Portfolio berhasil ditambahkan');
    }

    public function edit(Portfolio $portfolio)
    {
        $this->authorize('update', $portfolio);
        return view('portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $this->authorize('update', $portfolio);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'file' => 'nullable|file|mimes:html,yaml,php,js,py,pdf,png,jpeg,jpg,mysql,doc,docx,xls,xlsx,ppt,pptx,txt|max:10240',
            'link' => 'nullable|url',
        ]);

        // Jika ada gambar baru, hapus gambar lama dan simpan yang baru
        if ($request->hasFile('image')) {
            if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Jika ada file baru, hapus file lama dan simpan yang baru
        if ($request->hasFile('file')) {
            if ($portfolio->file && Storage::disk('public')->exists($portfolio->file)) {
                Storage::disk('public')->delete($portfolio->file);
            }
            $data['file'] = $request->file('file')->store('files', 'public');
        }

        $portfolio->update($data);

        return redirect()->route('portfolio.index')->with('success', 'Portfolio berhasil diperbarui');
    }

    public function destroy(Portfolio $portfolio)
    {
        $this->authorize('delete', $portfolio);

        // Hapus file gambar dan dokumen jika ada sebelum hapus record
        if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
            Storage::disk('public')->delete($portfolio->image);
        }

        if ($portfolio->file && Storage::disk('public')->exists($portfolio->file)) {
            Storage::disk('public')->delete($portfolio->file);
        }

        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio berhasil dihapus');
    }

    public function show($id)
    {   
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolio.show', compact('portfolio'));
    }
    public function adminShow($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.show', compact('portfolio'));
    }

    public function userPortfolio()
    {
        $portfolios = Portfolio::all();
        return view('portfolio.user-index', compact('portfolios'));
    }
    public function userShow($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolio.user-show', compact('portfolio'));
    }
}
