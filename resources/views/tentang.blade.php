@extends('layouts.app')

@section('title', 'Tentang Saya')

@section('content')
<style>
    .tentang-section {
        background: linear-gradient(135deg, #f0f8ff, #e0f7fa); /* Warna cerah gradasi */
        padding: 80px 20px;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tentang-card {
        background-color: white;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 800px;
        width: 100%;
    }

    .tentang-card img {
        border-radius: 50%;
        width: 140px;
        height: 140px;
        object-fit: cover;
        margin-bottom: 20px;
        border: 4px solid #00bcd4;
    }

    .tentang-card h1 {
        color: #00796b;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .tentang-card p {
        color: #444;
        font-size: 16px;
        line-height: 1.7;
    }
</style>

<div class="tentang-section">
    <div class="tentang-card">
        <h1>Tentang Saya</h1>
        <p>
            Halo! Saya adalah seorang mahasiswa <strong>Teknik Informatika</strong> di <strong>Universitas Semarang</strong>.
        </p>
        <p>
            Website ini adalah portofolio pribadi yang berisi berbagai project yang telah saya kerjakan, baik selama perkuliahan maupun secara mandiri. Saya tertarik pada pengembangan website, aplikasi, dan teknologi lainnya.
        </p>
    </div>
</div>
@endsection
