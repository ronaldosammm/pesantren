@extends('layouts.app')
@section('content')

<!-- HERO -->
<section class="pendaftaran-hero">
    <div class="container">
        <span class="eyebrow eyebrow-light eyebrow-center">Penerimaan Santri Baru</span>
        <h1>Formulir Pendaftaran</h1>
        <p>Isi data di bawah untuk mendaftarkan putra-putri Anda di Ma'had Askar Kauny</p>
    </div>
</section>

<!-- FORM -->
<section class="pendaftaran-section">
    <div class="container">

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                Mohon periksa kembali data yang Anda isi.
            </div>
        @endif

        <div class="pendaftaran-card">
            <span class="eyebrow">Data Pendaftaran</span>
            <h2>Formulir Calon Santri</h2>
            <p class="pendaftaran-lead">
                Pastikan data yang Anda isi sudah benar. Tim kami akan menghubungi
                Anda melalui email atau WhatsApp setelah pendaftaran diterima.
            </p>

            <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="pendaftaran-form-grid">

                    <div class="pendaftaran-field full-width">
                        <label>Program yang Diminati</label>
                        <select name="program_id">
                            <option value="">-- Pilih Program --</option>
                            @foreach ($program as $item)
                                <option value="{{ $item->id }}" {{ old('program_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_program }}
                                </option>
                            @endforeach
                        </select>
                        @error('program_id')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="pendaftaran-field">
                        <label>Nama Lengkap Calon Santri</label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama lengkap">
                        @error('nama_lengkap')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="pendaftaran-field">
                        <label>Nama Orang Tua / Wali</label>
                        <input type="text" name="nama_wali" value="{{ old('nama_wali') }}" placeholder="Masukkan nama wali">
                        @error('nama_wali')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="pendaftaran-field">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="pendaftaran-field">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin">
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="pendaftaran-field">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com">
                        @error('email')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="pendaftaran-field">
                        <label>No. WhatsApp</label>
                        <input type="text" name="no_telepon" value="{{ old('no_telepon') }}" placeholder="08xxxxxxxxxx">
                        @error('no_telepon')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="pendaftaran-field full-width">
                        <label>Alamat Lengkap</label>
                        <textarea name="alamat" placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="pendaftaran-field full-width">
                        <label>Upload Dokumen (Akta Lahir / KK — opsional, PDF/JPG/PNG, maks 2MB)</label>
                        <input type="file" name="dokumen">
                        @error('dokumen')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="pendaftaran-submit">Kirim Pendaftaran</button>

                </div>
            </form>
        </div>

    </div>
</section>

@endsection