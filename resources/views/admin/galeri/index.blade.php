@extends('layouts.admin')

@section('title', 'Kelola Galeri')

@section('content')
    <div class="admin-page-head">
        <h1>Kelola Galeri</h1>
        <a href="{{ route('admin.galeri.create') }}" class="btn-add">+ Tambah Foto</a>
    </div>

    @if(session('status'))
        <div class="alert-success">{{ session('status') }}</div>
    @endif

    <table class="admin-table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Caption</th>
                <th>Urutan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($photos as $photo)
                <tr>
                    <td><img src="{{ asset('storage/' . $photo->file) }}" class="admin-table__thumb" alt="Galeri"></td>
                    <td>{{ $photo->caption }}</td>
                    <td>{{ $photo->urutan }}</td>
                    <td class="admin-table__actions">
                        <a href="{{ route('admin.galeri.edit', $photo) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('admin.galeri.destroy', $photo) }}" method="POST" onsubmit="return confirm('Yakin hapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Belum ada foto.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
