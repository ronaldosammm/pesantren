@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="program-hero">
    <div class="container">
        <h1>Program Kami</h1>
        <p>Temukan program terbaik untuk generasi Qur’ani</p>
    </div>
</section>

<!-- LIST PROGRAM -->
<section class="program-list">
    <div class="container">

        <div class="program-grid">

            <!-- CARD -->
            <div class="program-card">
                <div class="program-img"></div>
                <h3>Tahfidz Intensif</h3>
                <p>Program menghafal Al-Qur’an dengan metode Kauny.</p>
                <span>Durasi: 3 Bulan</span>
                <a href="#">Lihat Detail</a>
            </div>

            <div class="program-card">
                <div class="program-img"></div>
                <h3>Tahsin Al-Qur’an</h3>
                <p>Memperbaiki bacaan Al-Qur’an sesuai tajwid.</p>
                <span>Durasi: 2 Bulan</span>
                <a href="#">Lihat Detail</a>
            </div>

            <div class="program-card">
                <div class="program-img"></div>
                <h3>Kelas Anak</h3>
                <p>Pembelajaran Qur’an untuk anak-anak.</p>
                <span>Durasi: 6 Bulan</span>
                <a href="#">Lihat Detail</a>
            </div>

        </div>

    </div>
</section>

<!-- KEUNGGULAN -->
<section class="program-benefit">
    <div class="container">

        <h2 class="section-title">Kenapa Memilih Kami?</h2>

        <div class="benefit-list">
            <div>✔ Metode Kauny</div>
            <div>✔ Mentor Berpengalaman</div>
            <div>✔ Lingkungan Islami</div>
            <div>✔ Program Terstruktur</div>
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