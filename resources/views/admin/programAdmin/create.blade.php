```php
@extends('admin.layouts.app')

@section('content')

<div class="dashboard-title">
    <h1>Tambah Program</h1>
    <p>Tambahkan program pesantren baru</p>
</div>

<div class="form-card">

    <form action="{{ route('program.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nama Program</label>

            <input 
                type="text" 
                name="nama_program" 
                placeholder="Masukkan nama program"
                value="{{ old('nama_program') }}"
            >

            @error('nama_program')
                <small style="color:red;">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label>Durasi</label>

            <input 
                type="text" 
                name="durasi" 
                placeholder="Contoh: 2 Tahun"
                value="{{ old('durasi') }}"
            >

            @error('durasi')
                <small style="color:red;">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi</label>

            <textarea 
                name="deskripsi_program" 
                rows="5" 
                placeholder="Masukkan deskripsi program"
            >{{ old('deskripsi_program') }}</textarea>

            @error('deskripsi_program')
                <small style="color:red;">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label>Gambar Program</label>

            <div class="upload-box">
                <input type="file" name="gambar">
            </div>

            @error('gambar')
                <small style="color:red;">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="button-group">

            <a href="{{ route('program.index') }}" class="cancel-btn">
                Kembali
            </a>

            <button type="submit" class="save-btn">
                Simpan Program
            </button>

        </div>

    </form>

</div>

@endsection
```
