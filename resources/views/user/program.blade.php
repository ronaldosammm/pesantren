@extends('layouts.app')
@section('content')

<!-- HERO -->
<section class="program-hero">
    <div class="container">
        <span class="eyebrow eyebrow-light">Program Pendidikan</span>
        <h1>Program Kami</h1>
        <p>Temukan program terbaik untuk generasi Qur'ani</p>
    </div>
</section>

<!-- LIST PROGRAM -->
<section class="program-list">
    <div class="container">
        <div class="program-grid">
            @forelse ($program as $item)
                <div class="program-card">
                    <div class="program-img">
                        @if ($item->gambar)
                            <img
                                src="{{ asset('uploads/program/' . $item->gambar) }}"
                                alt="{{ $item->nama_program }}"
                            >
                        @endif
                    </div>
                    <h3>{{ $item->nama_program }}</h3>
                    <p>{{ $item->deskripsi_program }}</p>
                    <span>Durasi: {{ $item->durasi }}</span>
                    <a href="{{ route('program.detail', $item->id) }}">Detail</a>
                </div>
            @empty
                <p>Program belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>

<!-- KEUNGGULAN -->
<section class="program-benefit">
    <div class="container">
        <h2 class="section-title">Kenapa Memilih Kami?</h2>
        <div class="benefit-list">
            <div class="benefit-item"><span class="benefit-icon">✓</span> Metode Kauny</div>
            <div class="benefit-item"><span class="benefit-icon">✓</span> Mentor Berpengalaman</div>
            <div class="benefit-item"><span class="benefit-icon">✓</span> Lingkungan Islami</div>
            <div class="benefit-item"><span class="benefit-icon">✓</span> Program Terstruktur</div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="program-cta">
    <div class="container">
        <h2>Siap memulai perjalananmu?</h2>
        <a href="#" class="btn-daftar">Daftar Sekarang</a>
    </div>
</section>

@endsection