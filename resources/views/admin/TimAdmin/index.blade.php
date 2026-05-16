@extends('admin.layouts.app')

@section('content')

<div class="dashboard-title">
    <h1>Data Tim</h1>
    <p>Kelola data tim pesantren</p>
</div>

<a href="{{ route('tim.create') }}" class="add-btn">
    + Tambah Tim
</a>

<div class="card">

    <table class="program-table">

        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($tim as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>

                        @if ($item->foto)

                            <img 
                                src="{{ asset('uploads/tim/' . $item->foto) }}"
                                class="program-image"
                            >

                        @endif

                    </td>

                    <td>{{ $item->nama }}</td>

                    <td>{{ $item->jabatan }}</td>

                    <td>

                        <div class="action-buttons">

                            <a 
                                href="{{ route('tim.edit', $item->id) }}"
                                class="action-icon edit-icon"
                            >
                                <i class='bx bx-pencil'></i>
                            </a>

                            <form 
                                action="{{ route('tim.destroy', $item->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data?')"
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
                        Data tim belum tersedia
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection