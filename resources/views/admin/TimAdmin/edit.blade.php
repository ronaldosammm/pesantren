@extends('admin.layouts.app')

@section('content')

<div class="dashboard-title">
    <h1>Edit Tim</h1>
    <p>Edit data anggota tim</p>
</div>

<div class="form-card">

    <form action="{{ route('tim.update', $tim->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama</label>

            <input 
                type="text" 
                name="nama"
                value="{{ old('nama', $tim->nama) }}"
            >
        </div>

        <div class="form-group">
            <label>Jabatan</label>

            <input 
                type="text" 
                name="jabatan"
                value="{{ old('jabatan', $tim->jabatan) }}"
            >
        </div>

        <div class="form-group">
            <label>Foto</label>

            @if ($tim->foto)

                <img 
                    src="{{ asset('uploads/tim/' . $tim->foto) }}"
                    width="120"
                    style="margin-bottom:10px;"
                >

            @endif

            <div class="upload-box">
                <input type="file" name="foto">
            </div>

        </div>

        <div class="button-group">

            <a href="{{ route('tim.index') }}" class="cancel-btn">
                Kembali
            </a>

            <button type="submit" class="save-btn">
                Update
            </button>

        </div>

    </form>

</div>

@endsection