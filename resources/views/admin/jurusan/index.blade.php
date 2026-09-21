@extends('layouts.admin')

@section('title', 'Kelola Jurusan')

@section('content')
    <div class="admin-page-head">
        <h1>Kelola Jurusan</h1>
        <a href="{{ route('admin.jurusan.create') }}" class="btn-add">+ Tambah Jurusan</a>
    </div>

    @if(session('status'))
        <div class="alert-success">{{ session('status') }}</div>
    @endif

    <table class="admin-table">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Nama</th>
                <th>Singkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jurusans as $j)
                <tr>
                    <td>
                        @if($j->logo)
                            <img src="{{ asset('storage/' . $j->logo) }}" class="admin-table__thumb" alt="{{ $j->nama }}">
                        @else
                            <span class="admin-table__no-photo">-</span>
                        @endif
                    </td>
                    <td>{{ $j->nama }}</td>
                    <td>{{ $j->singkatan }}</td>
                    <td class="admin-table__actions">
                        <a href="{{ route('admin.jurusan.edit', $j) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('admin.jurusan.destroy', $j) }}" method="POST" onsubmit="return confirm('Yakin hapus jurusan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Belum ada data jurusan.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
