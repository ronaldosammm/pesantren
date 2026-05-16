@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="hero">
    <div class="container hero-content">

        <div class="hero-text">

            <h1>
                BERPIJAK PADA TRADISI <br>
                MENUMBUHKAN ILMU <br>
                MENUJU MASA DEPAN GEMILANG
            </h1>

            <p>
                Setiap anak merupakan amanah berharga yang memiliki potensi luar biasa.
                Tugas pendidikan bukan hanya membentuk kecerdasan, tetapi juga menanamkan
                akhlak, keteladanan, dan nilai-nilai keislaman agar tumbuh menjadi generasi
                yang berilmu, berkarakter, dan bermanfaat bagi umat.
            </p>

        </div>

        <div class="hero-image">
            <div class="image-placeholder"></div>
        </div>

    </div>
</section>

<!-- ABOUT -->
<section class="about">

    <div class="container">

        <h2>Tentang Kami</h2>

        <p>
            Askar Kauny merupakan lembaga dakwah dan pendidikan Al-Qur’an yang berkomitmen
            dalam membina generasi Qur’ani melalui pendidikan yang berlandaskan nilai-nilai Islam.
            Kami hadir untuk menanamkan kecintaan terhadap Al-Qur’an, membangun akhlak mulia,
            serta mencetak generasi yang unggul dalam ilmu pengetahuan, spiritualitas, dan kepemimpinan.

            <br><br>

            Sebagai lembaga sosial dan pendidikan non-profit, Askar Kauny terus berupaya
            memberikan kontribusi terbaik bagi masyarakat melalui program pendidikan,
            pembinaan karakter, serta pengembangan hafalan Al-Qur’an yang berkualitas dan berkelanjutan.
        </p>

        <div class="cards">

            @forelse ($program as $item)

                <div class="card">

                    <div class="img">

                        @if ($item->gambar)

                            <img 
                                src="{{ asset('uploads/program/' . $item->gambar) }}"
                                alt="{{ $item->nama_program }}"
                            >

                        @endif

                    </div>

                    <h3>{{ $item->nama_program }}</h3>

                    <p>{{ $item->deskripsi_program }}</p>

                    <span>Durasi Program: {{ $item->durasi }}</span>

                    <a href="/program">
                        Lihat Selengkapnya
                    </a>

                </div>

            @empty

                <p>Program pendidikan belum tersedia saat ini.</p>

            @endforelse

        </div>

    </div>

</section>

@endsection