@extends('layouts.admin')

@section('title', 'Kelola Guru')

@section('content')
    <div class="admin-page-head">
        <h1>Kelola Guru &amp; Staf</h1>
        <a href="{{ route('admin.guru.create') }}" class="btn-add">+ Tambah Guru</a>
    </div>

    @if(session('status'))
        <div class="alert-success">{{ session('status') }}</div>
    @endif

    <table class="admin-table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Urutan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($gurus as $guru)
                <tr>
                    <td>
                        @if($guru->foto)
                            <img src="{{ asset('storage/' . $guru->foto) }}" class="admin-table__thumb" alt="{{ $guru->nama }}">
                        @else
                            <span class="admin-table__no-photo">-</span>
                        @endif
                    </td>
                    <td>{{ $guru->nama }}</td>
                    <td>{{ $guru->jabatan }}</td>
                    <td>{{ $guru->urutan }}</td>
                    <td class="admin-table__actions">
                        <a href="{{ route('admin.guru.edit', $guru) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('admin.guru.destroy', $guru) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Belum ada data guru.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
