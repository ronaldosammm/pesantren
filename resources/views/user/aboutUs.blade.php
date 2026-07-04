@extends('layouts.app')
@section('content')

<!-- HERO HIJAU -->
<section class="about-hero">
    <div class="container">
        <span class="eyebrow eyebrow-light">Profil Lembaga</span>
        <h1>Tentang Kami</h1>
        <p>Mengenal lebih dekat MA'HAD ASKAR KAUNY</p>
    </div>
</section>

<!-- ABOUT BOX -->
<section class="about-page">
    <div class="container">
        <div class="about-box">
            <h2 class="section-title">Values, Dream, Vision & Mission</h2>

            <div class="value-grid">
                <div class="value-item">
                    <h3>Values</h3>
                    <p>Integritas, rasa ingin tahu, dan kebermanfaatan.</p>
                </div>
                <div class="value-item">
                    <h3>Dream</h3>
                    <p>Bersama membangun generasi unggul yang berdaya dan berakhlak.</p>
                </div>
                <div class="value-item">
                    <h3>Vision</h3>
                    <p>Menjadi lembaga pendidikan Qur'ani terbaik.</p>
                </div>
                <div class="value-item">
                    <h3>Mission</h3>
                    <p>
                        Memberikan pendidikan berkualitas, membentuk karakter,
                        dan mencetak generasi penghafal Al-Qur'an.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TEAM -->
<section class="team-section">
    <div class="container">
        <div class="team-box">
            <h2 class="section-title">Tim Kami</h2>
            <div class="team-grid">
                @forelse ($tim as $item)
                    <div class="team-item">
                        <div class="team-img">
                            @if ($item->foto)
                                <img
                                    src="{{ asset('uploads/tim/' . $item->foto) }}"
                                    alt="{{ $item->nama }}"
                                >
                            @endif
                        </div>
                        <h4>{{ $item->nama }}</h4>
                        <p>{{ $item->jabatan }}</p>
                    </div>
                @empty
                    <p>Data tim belum tersedia.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

@endsection