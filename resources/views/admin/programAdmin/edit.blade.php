@extends('admin.layouts.app')

@section('content')

<div class="dashboard-title">
    <h1>Edit Program</h1>
    <p>Edit data program pesantren</p>
</div>

<div class="form-card">

    <form action="{{ route('program.update', $program->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Program</label>

            <input 
                type="text" 
                name="nama_program" 
                placeholder="Masukkan nama program"
                value="{{ old('nama_program', $program->nama_program) }}"
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
                value="{{ old('durasi', $program->durasi) }}"
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
            >{{ old('deskripsi_program', $program->deskripsi_program) }}</textarea>

            @error('deskripsi_program')
                <small style="color:red;">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label>Gambar Program</label>

            @if($program->gambar)
                <div style="margin-bottom:15px;">
                    <img 
                        src="{{ asset('storage/' . $program->gambar) }}" 
                        width="150"
                        style="border-radius:10px;"
                    >
                </div>
            @endif

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
                Update Program
            </button>

        </div>

    </form>

</div>

@endsection