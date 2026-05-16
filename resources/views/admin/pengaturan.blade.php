@extends('admin.layouts.app')

@section('content')

<div class="dashboard-title">
    <h1>Pengaturan</h1>
    <p>Kelola informasi akun admin</p>
</div>

<div class="setting-container">

    <!-- PROFILE CARD -->
    <div class="profile-card">

        <div class="profile-header">
            <div class="profile-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

            <div>
                <h2>{{ Auth::user()->name }}</h2>
                <p>Administrator Pesantren</p>
            </div>
        </div>

        <div class="profile-info">

            <div class="info-item">
                <label>Nama Admin</label>
                <div class="info-box">
                    {{ Auth::user()->name }}
                </div>
            </div>

            <div class="info-item">
                <label>Email</label>
                <div class="info-box">
                    {{ Auth::user()->email }}
                </div>
            </div>

            <div class="info-item">
                <label>Status</label>
                <div class="info-box">
                    Aktif
                </div>
            </div>

        </div>

    </div>

    <!-- LOGOUT CARD -->
    <div class="logout-card">

        <h3>Keluar Akun</h3>

        <p>
            Klik tombol di bawah untuk logout dari dashboard admin.
        </p>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="logout-btn">
                Logout
            </button>
        </form>

    </div>

</div>

@endsection