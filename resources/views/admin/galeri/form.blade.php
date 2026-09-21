@extends('layouts.admin')

@section('title', $galeri->exists ? 'Edit Foto' : 'Tambah Foto')

@section('content')
    <h1>{{ $galeri->exists ? 'Edit Foto' : 'Tambah Foto' }}</h1>

    <form class="admin-form"
          action="{{ $galeri->exists ? route('admin.galeri.update', $galeri) : route('admin.galeri.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @if($galeri->exists) @method('PUT') @endif

        <div class="form-group">
            <label>Caption</label>
            <input type="text" name="caption" value="{{ old('caption', $galeri->caption) }}">
            @error('caption') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Urutan Tampil</label>
            <input type="number" name="urutan" value="{{ old('urutan', $galeri->urutan) }}">
            @error('urutan') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Foto {{ $galeri->exists ? '(kosongkan jika tidak diganti)' : '' }}</label>
            @if($galeri->file)
                <div class="current-photo">
                    <img src="{{ asset('storage/' . $galeri->file) }}" alt="Foto saat ini">
                </div>
            @endif
            <input type="file" name="file" accept="image/*" {{ $galeri->exists ? '' : 'required' }}>
            @error('file') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save">Simpan</button>
            <a href="{{ route('admin.galeri.index') }}" class="btn-cancel">Batal</a>
        </div>
    </form>
@endsection
