@extends('admin.layouts.app')
@section('content')

<div class="dash-header">
    <span class="eyebrow">Selamat Datang Kembali</span>
    <h1>Dashboard Admin</h1>
    <p>Kelola data Pondok Pesantren Ma'had Askar Kauny dengan mudah</p>
</div>

<!-- STAT CARDS -->
<div class="dash-stats">
    <div class="dash-stat-card">
        <div class="dash-stat-icon">📚</div>
        <div class="dash-stat-info">
            <h3>Total Program</h3>
            <div class="dash-stat-number">{{ $totalProgram ?? (isset($program) ? count($program) : 0) }}</div>
            <span class="dash-stat-caption">Program pembelajaran aktif</span>
        </div>
    </div>

    <div class="dash-stat-card">
        <div class="dash-stat-icon">🧑‍🏫</div>
        <div class="dash-stat-info">
            <h3>Total Tim</h3>
            <div class="dash-stat-number">{{ $totalTim ?? (isset($tim) ? count($tim) : 0) }}</div>
            <span class="dash-stat-caption">Tim dan pengajar pesantren</span>
        </div>
    </div>
</div>

<!-- CHART + QUICK ACTIONS -->
<div class="dash-grid">
    <div class="dash-panel">
        <h2>Ringkasan Data <span class="dash-panel-tag">Overview</span></h2>
        <canvas id="dashSummaryChart" height="140"></canvas>
    </div>

    <div class="dash-panel">
        <h2>Aksi Cepat</h2>
        <div class="dash-quick-actions">
            <a href="{{ route('program.create') }}" class="dash-btn">
                <span class="dash-btn-icon">+</span> Tambah Program Baru
            </a>
            <a href="{{ route('tim.create') }}" class="dash-btn">
                <span class="dash-btn-icon">+</span> Tambah Anggota Tim
            </a>
            <a href="{{ route('program.index') }}" class="dash-btn">
                <span class="dash-btn-icon">☰</span> Kelola Semua Program
            </a>
            <a href="{{ route('tim.index') }}" class="dash-btn">
                <span class="dash-btn-icon">☰</span> Kelola Semua Tim
            </a>
        </div>
    </div>
</div>

<!-- RECENT DATA -->
<div class="dash-grid">
    <div class="dash-panel">
        <h2>Program Terbaru <span class="dash-panel-tag">Terkini</span></h2>
        <table class="dash-table">
            <thead>
                <tr>
                    <th>Program</th>
                    <th>Durasi</th>
                </tr>
            </thead>
            <tbody>
                @forelse (($program ?? []) as $item)
                    <tr>
                        <td>
                            <span class="dash-thumb">
                                @if ($item->gambar)
                                    <img src="{{ asset('uploads/program/' . $item->gambar) }}" alt="{{ $item->nama_program }}">
                                @endif
                            </span>
                            {{ $item->nama_program }}
                        </td>
                        <td>{{ $item->durasi }}</td>
                    </tr>
                @empty
                    <tr><td colspan="2" class="dash-empty">Belum ada program.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="dash-panel">
        <h2>Tim Terbaru <span class="dash-panel-tag">Terkini</span></h2>
        <table class="dash-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jabatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse (($tim ?? []) as $item)
                    <tr>
                        <td>
                            <span class="dash-thumb">
                                @if ($item->foto)
                                    <img src="{{ asset('uploads/tim/' . $item->foto) }}" alt="{{ $item->nama }}">
                                @endif
                            </span>
                            {{ $item->nama }}
                        </td>
                        <td>{{ $item->jabatan }}</td>
                    </tr>
                @empty
                    <tr><td colspan="2" class="dash-empty">Belum ada anggota tim.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const dashCtx = document.getElementById('dashSummaryChart');
    new Chart(dashCtx, {
        type: 'bar',
        data: {
            labels: ['Program', 'Tim'],
            datasets: [{
                label: 'Jumlah',
                data: [
                    {{ $totalProgram ?? (isset($program) ? count($program) : 0) }},
                    {{ $totalTim ?? (isset($tim) ? count($tim) : 0) }}
                ],
                backgroundColor: ['#1F4D3D', '#B8935A'],
                borderRadius: 8,
                maxBarThickness: 70
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, ticks: { precision: 0 } }
            }
        }
    });
</script>

@endsection