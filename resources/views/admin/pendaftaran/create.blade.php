@extends('admin.layouts.app')
@section('content')

<div class="dashboard-title">
    <h1>Tambah Pendaftar</h1>
    <p>Input data pendaftar secara manual (misal pendaftaran langsung/offline)</p>
</div>

<div class="form-card">
    <form action="{{ route('pendaftaran.adminStore') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Program yang Diminati</label>
            <select name="program_id" style="width:100%; padding:12px 14px; border:1px solid rgba(184,147,90,0.3); border-radius:6px; font-family:var(--font-body); font-size:14.5px;">
                <option value="">-- Pilih Program --</option>
                @foreach ($program as $p)
                    <option value="{{ $p->id }}" {{ old('program_id') == $p->id ? 'selected' : '' }}>
                        {{ $p->nama_program }}
                    </option>
                @endforeach
            </select>
            @error('program_id')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Nama Lengkap Calon Santri</label>
            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama lengkap">
            @error('nama_lengkap')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Nama Orang Tua / Wali</label>
            <input type="text" name="nama_wali" value="{{ old('nama_wali') }}" placeholder="Masukkan nama wali">
            @error('nama_wali')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
            @error('tanggal_lahir')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" style="width:100%; padding:12px 14px; border:1px solid rgba(184,147,90,0.3); border-radius:6px; font-family:var(--font-body); font-size:14.5px;">
                <option value="">-- Pilih --</option>
                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com">
            @error('email')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>No. WhatsApp</label>
            <input type="text" name="no_telepon" value="{{ old('no_telepon') }}" placeholder="08xxxxxxxxxx">
            @error('no_telepon')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Alamat Lengkap</label>
            <textarea name="alamat" rows="4" placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
            @error('alamat')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" style="width:100%; padding:12px 14px; border:1px solid rgba(184,147,90,0.3); border-radius:6px; font-family:var(--font-body); font-size:14.5px;">
                <option value="baru">Baru</option>
                <option value="diproses">Diproses</option>
                <option value="diterima">Diterima</option>
                <option value="ditolak">Ditolak</option>
            </select>
        </div>

        <div class="form-group">
            <label>Catatan Admin (opsional)</label>
            <textarea name="catatan_admin" rows="3" placeholder="Catatan internal">{{ old('catatan_admin') }}</textarea>
        </div>

        <div class="form-group">
            <label>Dokumen (opsional, PDF/JPG/PNG, maks 2MB)</label>
            <div class="upload-box">
                <input type="file" name="dokumen">
            </div>
            @error('dokumen')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="button-group">
            <a href="{{ route('pendaftaran.index') }}" class="cancel-btn">Kembali</a>
            <button type="submit" class="save-btn">Simpan Pendaftar</button>
        </div>
    </form>
</div>

@endsection