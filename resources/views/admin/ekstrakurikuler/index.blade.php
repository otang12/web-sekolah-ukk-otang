@extends('layouts.admin')

@section('title', 'Kelola Ekstrakurikuler')

@section('content')
    <div class="admin-page-head">
        <h1>Kelola Ekstrakurikuler</h1>
        <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn-add">+ Tambah Ekstrakurikuler</a>
    </div>

    @if(session('status'))
        <div class="alert-success">{{ session('status') }}</div>
    @endif

    <table class="admin-table">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Nama</th>
                <th>Urutan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ekskuls as $e)
                <tr>
                    <td>
                        @if($e->logo)
                            <img src="{{ asset('storage/' . $e->logo) }}" class="admin-table__thumb" alt="{{ $e->nama }}">
                        @else
                            <span class="admin-table__no-photo">-</span>
                        @endif
                    </td>
                    <td>{{ $e->nama }}</td>
                    <td>{{ $e->urutan }}</td>
                    <td class="admin-table__actions">
                        <a href="{{ route('admin.ekstrakurikuler.edit', $e) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('admin.ekstrakurikuler.destroy', $e) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Belum ada data ekstrakurikuler.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
