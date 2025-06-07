<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KontakController;



// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Halaman Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth user
Route::middleware(['auth'])->group(function () {
    Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
    Route::get('/portfolio/{portfolio}', [PortfolioController::class, 'show'])->name('portfolio.show');
    Route::get('/portfolio', [PortfolioController::class, 'userPortfolio'])->name('portfolio');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/edit', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/test', function () {
        return view('test');
    });
});
// CRUD Projects untuk Admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('projects', ProjectController::class);
});

// Halaman Tentang dan Kontak
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::middleware(['auth'])->group(function () {
    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::post('/kontak', [KontakController::class, 'kirim'])->name('kontak.kirim');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware([IsAdmin::class])->group(function () {
        // Semua route admin di bawah ini
        Route::get('/admin/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
        Route::get('/admin/portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
        Route::post('/admin/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
        Route::resource('portfolios', PortfolioController::class)->middleware('auth');
        Route::get('/admin/pesan', [KontakController::class, 'index'])->name('admin.pesan.index');
        Route::get('/admin/pesan/{id}', [KontakController::class, 'show'])->name('admin.pesan.show');
        Route::get('/admin/portfolio/{portfolio}', [PortfolioController::class, 'show'])->name('admin.portfolio.show');

    });
});

// Menambahkan Route Resource untuk Portfolio
Route::resource('portfolios', PortfolioController::class)->middleware('auth');

// Route untuk mengedit dan menghapus portfolio oleh admin atau user yang memiliki akses
Route::middleware(['auth'])->group(function () {
    Route::get('/portfolio/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::put('/portfolio/{portfolio}', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('/portfolio/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
});

Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});


require __DIR__.'/auth.php';
