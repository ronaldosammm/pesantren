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
            <div class="image-placeholder">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Ma'had Askar Kauny">
            </div>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="about">
    <div class="container">
        <span class="eyebrow">Sekilas Tentang Kami</span>
        <h2>Tentang Ma'had Askar Kauny</h2>
        <p>
            Askar Kauny merupakan lembaga dakwah dan pendidikan Al-Qur'an yang berkomitmen
            dalam membina generasi Qur'ani melalui pendidikan yang berlandaskan nilai-nilai Islam.
            Kami hadir untuk menanamkan kecintaan terhadap Al-Qur'an, membangun akhlak mulia,
            serta mencetak generasi yang unggul dalam ilmu pengetahuan, spiritualitas, dan kepemimpinan.
            <br><br>
            Sebagai lembaga sosial dan pendidikan non-profit, Askar Kauny terus berupaya
            memberikan kontribusi terbaik bagi masyarakat melalui program pendidikan,
            pembinaan karakter, serta pengembangan hafalan Al-Qur'an yang berkualitas dan berkelanjutan.
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
                    <a href="/program">Lihat Selengkapnya</a>
                </div>
            @empty
                <p>Program pendidikan belum tersedia saat ini.</p>
            @endforelse
        </div>
    </div>
</section>

<!-- WHY CHOOSE US -->
<section class="why-choose">
    <div class="container">
        <span class="eyebrow eyebrow-center">Keunggulan Kami</span>
        <h2 class="section-title">Mengapa Memilih Askar Kauny</h2>
        <p class="section-lead">
            Kami memadukan metode menghafal Al-Qur'an yang teruji dengan pembinaan
            akhlak dan pendampingan personal, agar setiap santri tumbuh seimbang
            antara ilmu, iman, dan kepribadian.
        </p>

        <div class="why-grid">
            <div class="why-item">
                <div class="why-icon">📖</div>
                <h3>Metode Kauny Quantum Memory</h3>
                <p>Teknik menghafal yang mudah diikuti dan terbukti membekas dalam ingatan santri.</p>
            </div>
            <div class="why-item">
                <div class="why-icon">🧕</div>
                <h3>Ustadz & Ustadzah Berpengalaman</h3>
                <p>Dibimbing oleh pengajar bersanad yang berdedikasi pada perkembangan santri.</p>
            </div>
            <div class="why-item">
                <div class="why-icon">🕌</div>
                <h3>Lingkungan Islami</h3>
                <p>Suasana belajar yang menumbuhkan adab, kedisiplinan, dan kecintaan pada Al-Qur'an.</p>
            </div>
            <div class="why-item">
                <div class="why-icon">🤝</div>
                <h3>Pendampingan Personal</h3>
                <p>Perkembangan setiap santri dipantau dan dilaporkan secara berkala kepada orang tua.</p>
            </div>
        </div>
    </div>
</section>

<!-- STATS -->
<section class="stats-band">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">10+</div>
                <div class="stat-label">Tahun Berkiprah</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">1.200+</div>
                <div class="stat-label">Santri Terbina</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">40+</div>
                <div class="stat-label">Ustadz & Ustadzah</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">15</div>
                <div class="stat-label">Cabang & Mitra</div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials">
    <div class="container">
        <span class="eyebrow eyebrow-center">Testimoni</span>
        <h2 class="section-title">Kata Mereka Tentang Kami</h2>

        <div class="testimonial-grid">
            <div class="testimonial-card">
                <span class="quote-mark">"</span>
                <p class="testimonial-text">
                    Anak saya jadi lebih semangat menghafal Al-Qur'an sejak bergabung.
                    Metodenya menyenangkan dan tidak membebani.
                </p>
                <div class="testimonial-author">
                    <div class="author-avatar"></div>
                    <div>
                        <div class="author-name">Ibu Rahmawati</div>
                        <div class="author-role">Wali Santri</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <span class="quote-mark">"</span>
                <p class="testimonial-text">
                    Pendampingan dari para ustadz sangat sabar dan personal.
                    Perkembangan hafalan anak selalu dilaporkan dengan jelas.
                </p>
                <div class="testimonial-author">
                    <div class="author-avatar"></div>
                    <div>
                        <div class="author-name">Bapak Fauzan</div>
                        <div class="author-role">Wali Santri</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <span class="quote-mark">"</span>
                <p class="testimonial-text">
                    Lingkungan belajarnya islami dan hangat. Anak saya makin baik
                    adabnya sejak mengikuti program di sini.
                </p>
                <div class="testimonial-author">
                    <div class="author-avatar"></div>
                    <div>
                        <div class="author-name">Ibu Siti Aminah</div>
                        <div class="author-role">Wali Santri</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="program-cta">
    <div class="container">
        <h2>Siap Bergabung Bersama Kami?</h2>
        <p class="cta-lead">
            Daftarkan putra-putri Anda dan mulai perjalanan menghafal Al-Qur'an
            bersama Ma'had Askar Kauny.
        </p>
        <a href="/program" class="btn-daftar">Lihat Program Kami</a>
    </div>
</section>

@endsection