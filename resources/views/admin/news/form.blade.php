@extends('layouts.admin')

@section('title', $news->exists ? 'Edit Berita' : 'Tambah Berita')

@section('content')
    <h1>{{ $news->exists ? 'Edit Berita' : 'Tambah Berita' }}</h1>

    <form class="admin-form"
          action="{{ $news->exists ? route('admin.news.update', $news) : route('admin.news.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @if($news->exists) @method('PUT') @endif

        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" value="{{ old('title', $news->title) }}" required>
            @error('title') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="category" value="{{ old('category', $news->category) }}" placeholder="Contoh: prestasi, info-pendidikan">
            @error('category') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Ringkasan (Excerpt)</label>
            <textarea name="excerpt">{{ old('excerpt', $news->excerpt) }}</textarea>
            @error('excerpt') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Isi Berita</label>
            <textarea name="body" style="min-height:220px" required>{{ old('body', $news->body) }}</textarea>
            @error('body') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Penulis</label>
            <input type="text" name="author" value="{{ old('author', $news->author) }}">
            @error('author') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Tanggal Terbit</label>
            <input type="datetime-local" name="published_at"
                   value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : '') }}">
            @error('published_at') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Gambar</label>
            @if($news->image)
                <div class="current-photo">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="Gambar saat ini">
                </div>
            @endif
            <input type="file" name="image" accept="image/*">
            @error('image') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save">Simpan</button>
            <a href="{{ route('admin.news.index') }}" class="btn-cancel">Batal</a>
        </div>
    </form>
@endsection
