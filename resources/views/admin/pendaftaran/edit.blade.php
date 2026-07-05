@extends('admin.layouts.app')
@section('content')

<div class="dashboard-title">
    <h1>Edit Pendaftar</h1>
    <p>Perbarui data dan status pendaftaran</p>
</div>

<div class="form-card">
    <form action="{{ route('pendaftaran.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Program yang Diminati</label>
            <select name="program_id" style="width:100%; padding:12px 14px; border:1px solid rgba(184,147,90,0.3); border-radius:6px; font-family:var(--font-body); font-size:14.5px;">
                <option value="">-- Pilih Program --</option>
                @foreach ($program as $p)
                    <option value="{{ $p->id }}" {{ old('program_id', $item->program_id) == $p->id ? 'selected' : '' }}>
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
            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $item->nama_lengkap) }}">
            @error('nama_lengkap')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Nama Orang Tua / Wali</label>
            <input type="text" name="nama_wali" value="{{ old('nama_wali', $item->nama_wali) }}">
            @error('nama_wali')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $item->tanggal_lahir->format('Y-m-d')) }}">
            @error('tanggal_lahir')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" style="width:100%; padding:12px 14px; border:1px solid rgba(184,147,90,0.3); border-radius:6px; font-family:var(--font-body); font-size:14.5px;">
                <option value="Laki-laki" {{ old('jenis_kelamin', $item->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $item->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $item->email) }}">
            @error('email')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>No. WhatsApp</label>
            <input type="text" name="no_telepon" value="{{ old('no_telepon', $item->no_telepon) }}">
            @error('no_telepon')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Alamat Lengkap</label>
            <textarea name="alamat" rows="4">{{ old('alamat', $item->alamat) }}</textarea>
            @error('alamat')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" style="width:100%; padding:12px 14px; border:1px solid rgba(184,147,90,0.3); border-radius:6px; font-family:var(--font-body); font-size:14.5px;">
                <option value="baru" {{ old('status', $item->status) == 'baru' ? 'selected' : '' }}>Baru</option>
                <option value="diproses" {{ old('status', $item->status) == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="diterima" {{ old('status', $item->status) == 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="ditolak" {{ old('status', $item->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <div class="form-group">
            <label>Catatan Admin (opsional)</label>
            <textarea name="catatan_admin" rows="3" placeholder="Catatan internal, tidak terlihat oleh pendaftar">{{ old('catatan_admin', $item->catatan_admin) }}</textarea>
        </div>

        <div class="form-group">
            <label>Dokumen</label>
            @if ($item->dokumen)
                <div style="margin-bottom:12px;">
                    <a href="{{ asset('uploads/pendaftaran/' . $item->dokumen) }}" target="_blank" class="doc-link">
                        <i class='bx bx-file'></i> Lihat Dokumen Saat Ini
                    </a>
                </div>
            @else
                <p style="color:var(--muted); font-size:13.5px; margin-bottom:12px;">Belum ada dokumen diunggah.</p>
            @endif
            <div class="upload-box">
                <input type="file" name="dokumen">
            </div>
            <small style="display:block; margin-top:6px; color:var(--muted); font-size:12.5px;">
                Biarkan kosong jika tidak ingin mengganti dokumen.
            </small>
            @error('dokumen')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="button-group">
            <a href="{{ route('pendaftaran.index') }}" class="cancel-btn">Kembali</a>
            <button type="submit" class="save-btn">Update Pendaftar</button>
        </div>
    </form>
</div>

@endsection