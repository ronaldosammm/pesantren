@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="contact-hero">
    <div class="container">
        <h1>Hubungi Kami</h1>

        <p>
            Kami siap memberikan informasi dan membantu kebutuhan Anda
            terkait program pendidikan serta kegiatan pesantren.
        </p>
    </div>
</section>

<!-- CONTACT -->
<section class="contact-section">

    <div class="container contact-wrapper">

        <!-- INFO -->
        <div class="contact-info">

            <div class="contact-info-header">

                <span>Kontak Pesantren</span>

                <h2>Informasi Kontak</h2>

                <p>
                    Kami siap membantu Anda mendapatkan informasi mengenai
                    program pendidikan, pendaftaran santri, dan kegiatan pesantren.
                </p>

            </div>

            <div class="contact-card">

                <div class="contact-item">

                    <div class="contact-icon">
                        📱
                    </div>

                    <div>
                        <h3>WhatsApp Admin</h3>

                        <a 
                            href="https://wa.me/6282315135257" 
                            target="_blank"
                            class="contact-link"
                        >
                            0823-1513-5257
                        </a>
                    </div>

                </div>

                <div class="contact-item">

                    <div class="contact-icon">
                        📍
                    </div>

                    <div>
                        <h3>Alamat</h3>
                        <p>Tangerang, Indonesia</p>
                    </div>

                </div>

                <div class="contact-item">

                    <div class="contact-icon">
                        🕒
                    </div>

                    <div>
                        <h3>Jam Operasional</h3>
                        <p>Senin - Sabtu, 08.00 - 17.00 WIB</p>
                    </div>

                </div>

            </div>

        </div>

        <!-- FORM -->
        <div class="contact-form">

            <h2>Kirim Pesan Cepat</h2>

            <form 
                action="https://wa.me/6282315135257" 
                method="GET"
                target="_blank"
            >

                <input 
                    type="text" 
                    name="nama"
                    placeholder="Nama Lengkap" 
                    required
                >

                <input 
                    type="text" 
                    name="subjek"
                    placeholder="Subjek Pesan" 
                    required
                >

                <textarea 
                    name="text"
                    placeholder="Tulis pesan Anda..." 
                    rows="5" 
                    required
                ></textarea>

                <button type="submit">
                    Kirim ke WhatsApp
                </button>

            </form>

        </div>

    </div>

</section>

@endsection