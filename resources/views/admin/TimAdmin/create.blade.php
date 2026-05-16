@extends('admin.layouts.app')

@section('content')

<div class="dashboard-title">
    <h1>Tambah Tim</h1>
    <p>Tambahkan anggota tim baru</p>
</div>

<div class="form-card">

    <form action="{{ route('tim.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nama</label>

            <input 
                type="text" 
                name="nama"
                value="{{ old('nama') }}"
                placeholder="Masukkan nama"
            >
        </div>

        <div class="form-group">
            <label>Jabatan</label>

            <input 
                type="text" 
                name="jabatan"
                value="{{ old('jabatan') }}"
                placeholder="Masukkan jabatan"
            >
        </div>

        <div class="form-group">
            <label>Foto</label>

            <div class="upload-box">
                <input type="file" name="foto">
            </div>
        </div>

        <div class="button-group">

            <a href="{{ route('tim.index') }}" class="cancel-btn">
                Kembali
            </a>

            <button type="submit" class="save-btn">
                Simpan
            </button>

        </div>

    </form>

</div>

@endsection