@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="hero">
    <div class="container hero-content">

        <div class="hero-text">
            <h1>BERPIJAK <br> PADA TRADISI <br> TERBANG MENUJU MIMPI</h1>

            <p>
                setiap anak adalah benih unggul.tugas kita bukan memaksanya mekar saat ini juga,
                tapi memastikan tanahnya cukup kasih sayang dan air nya adalah keteladanan
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

        <h2>Tentang kami</h2>

        <p>
            Askar Kauny adalah Lembaga Dakwah Al-Qur’an yang berkhidmat dalam mengajarkan,
            menyebarkan cahaya Al-Qur’an ke seluruh penjuru Dunia dan mencetak generasi Qur’ani.
            Yayasan Askar Kauny adalah lembaga non profit yang bergerak di bidang sosial dan pendidikan,
            serta berkhidmat dalam mencetak generasi penghafal Alquran.
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

                    <span>Durasi: {{ $item->durasi }}</span>

                    <a href="/program">Selengkapnya</a>

                </div>

            @empty

                <p>Program belum tersedia.</p>

            @endforelse

        </div>

    </div>

</section>

@endsection