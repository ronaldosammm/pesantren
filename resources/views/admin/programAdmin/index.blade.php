@extends('admin.layouts.app')

@section('content')

<div class="dashboard-title">
    <h1>Program Pesantren</h1>
    <p>Kelola program pesantren dengan mudah</p>
</div>

<a href="/programAdmin/create" class="add-btn">
    + Tambah Program
</a>

<div class="card">

    <table class="program-table">

        <thead>
            <tr>
                <th>No</th>
                <th>Nama Program</th>
                 <th>Deskripsi Program</th>
                <th>Durasi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($program as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->nama_program }}</td>

                     <td>{{ $item->deskripsi_program }}</td>

                    <td>{{ $item->durasi }}</td>

                    <td>

                        @if ($item->gambar)

                            <img 
                                src="{{ asset('uploads/program/' . $item->gambar) }}" 
                                class="program-image"
                            >

                        @else

                            <span>Tidak ada gambar</span>

                        @endif

                    </td>

                    <td>

                        <div class="action-buttons">

                            <a 
                                href="{{ route('program.edit', $item->id) }}" 
                                class="action-icon edit-icon"
                            >
                                <i class='bx bx-pencil'></i>
                            </a>

                            <form 
                                action="{{ route('program.destroy', $item->id) }}" 
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus program ini?')"
                            >
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
                    <td colspan="5" style="text-align:center;">
                        Data program belum tersedia
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection