@extends('admin.layouts.app')
@section('content')

<div class="dashboard-title">
    <h1>Data Pendaftaran</h1>
    <p>Kelola pendaftaran calon santri baru</p>
</div>

@if (session('success'))
    <div class="alert-success" style="max-width:none; margin-bottom:20px;">{{ session('success') }}</div>
@endif

<a href="{{ route('pendaftaran.adminCreate') }}" class="add-btn">
    + Tambah Pendaftar
</a>

<div class="filter-tabs">
    <a href="{{ route('pendaftaran.index') }}" class="filter-tab {{ request('status') ? '' : 'active' }}">Semua</a>
    <a href="{{ route('pendaftaran.index', ['status' => 'baru']) }}" class="filter-tab {{ request('status') == 'baru' ? 'active' : '' }}">Baru</a>
    <a href="{{ route('pendaftaran.index', ['status' => 'diproses']) }}" class="filter-tab {{ request('status') == 'diproses' ? 'active' : '' }}">Diproses</a>
    <a href="{{ route('pendaftaran.index', ['status' => 'diterima']) }}" class="filter-tab {{ request('status') == 'diterima' ? 'active' : '' }}">Diterima</a>
    <a href="{{ route('pendaftaran.index', ['status' => 'ditolak']) }}" class="filter-tab {{ request('status') == 'ditolak' ? 'active' : '' }}">Ditolak</a>
</div>

<div class="card">
    <table class="program-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Calon Santri</th>
                <th>Program</th>
                <th>No. WhatsApp</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pendaftaran as $item)
                <tr>
                    <td>{{ $loop->iteration + ($pendaftaran->currentPage() - 1) * $pendaftaran->perPage() }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->program->nama_program ?? '-' }}</td>
                    <td>{{ $item->no_telepon }}</td>
                    <td>{{ $item->created_at->format('d M Y') }}</td>
                    <td>
                        <span class="status-badge status-{{ $item->status }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('pendaftaran.edit', $item->id) }}" class="action-icon edit-icon">
                                <i class='bx bx-pencil'></i>
                            </a>
                            <form action="{{ route('pendaftaran.destroy', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data pendaftar ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-icon delete-icon">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center;">Belum ada pendaftar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination-wrapper">
    {{ $pendaftaran->links() }}
</div>

@endsection