@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="contact-hero">
    <div class="container">
        <h1>Hubungi Kami</h1>
        <p>Kami siap membantu dan menjawab pertanyaan Anda</p>
    </div>
</section>

<!-- CONTACT -->
<section class="contact-section">
    <div class="container contact-wrapper">

        <!-- INFO -->
        <div class="contact-info">
            <h2>Kontak</h2>
            <p><strong>Telepon:</strong> +62 812-8388-9933</p>
            <p><strong>Email:</strong> villagurankhadijah@gmail.com</p>
            <p><strong>Alamat:</strong> Tangerang, Indonesia</p>
        </div>

        <!-- FORM -->
        <div class="contact-form">
            <h2>Kirim Pesan</h2>

            <form>
                <input type="text" placeholder="Nama" required>
                <input type="email" placeholder="Email" required>
                <textarea placeholder="Pesan" rows="5" required></textarea>
                <button type="submit">Kirim</button>
            </form>
        </div>

    </div>
</section>

@endsection