@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')
    <div class="admin-page-head">
        <h1>Kelola Berita</h1>
        <a href="{{ route('admin.news.create') }}" class="btn-add">+ Tambah Berita</a>
    </div>

    @if(session('status'))
        <div class="alert-success">{{ session('status') }}</div>
    @endif

    <table class="admin-table">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tanggal Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($newsList as $n)
                <tr>
                    <td>
                        @if($n->image)
                            <img src="{{ asset('storage/' . $n->image) }}" class="admin-table__thumb" alt="{{ $n->title }}">
                        @else
                            <span class="admin-table__no-photo">-</span>
                        @endif
                    </td>
                    <td>{{ $n->title }}</td>
                    <td>{{ $n->category }}</td>
                    <td>{{ $n->published_at?->format('d M Y') ?? '-' }}</td>
                    <td class="admin-table__actions">
                        <a href="{{ route('admin.news.edit', $n) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('admin.news.destroy', $n) }}" method="POST" onsubmit="return confirm('Yakin hapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Belum ada berita.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
