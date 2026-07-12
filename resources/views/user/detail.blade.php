@extends('layouts.app')
@section('content')

<!-- HERO -->
<section class="program-detail-hero">
    <div class="container">
        <span class="eyebrow eyebrow-light">Detail Program</span>
        <h1>{{ $item->nama_program }}</h1>
        <p>Durasi: {{ $item->durasi }}</p>
    </div>
</section>

<!-- CONTENT -->
<section class="program-detail-content">
    <div class="container">
        <div class="detail-card">

            @if ($item->gambar)
                <div class="detail-img-wrap">
                    <img
                        src="{{ asset('uploads/program/' . $item->gambar) }}"
                        alt="{{ $item->nama_program }}"
                        class="detail-img"
                    >
                </div>
            @endif

            <div class="detail-body">
                <span class="eyebrow">Tentang Program</span>
                <h2>{{ $item->nama_program }}</h2>
                <p class="detail-desc">{{ $item->deskripsi_program }}</p>

                <div class="detail-meta">
                    <div class="detail-meta-item">
                        <span class="detail-meta-icon">⏱</span>
                        <div>
                            <h4>Durasi</h4>
                            <p>{{ $item->durasi }}</p>
                        </div>
                    </div>
                </div>

                <div class="detail-actions">
                    <a href="{{ route('pendaftaran.index') ?? '#' }}" class="btn-daftar">Daftar Program Ini</a>
                    <a href="{{ route('program.index') }}" class="btn-back">&larr; Kembali ke Program</a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection