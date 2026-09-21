@extends('layouts.admin')

@section('title', $guru->exists ? 'Edit Guru' : 'Tambah Guru')

@section('content')
    <h1>{{ $guru->exists ? 'Edit Guru' : 'Tambah Guru' }}</h1>

    <form class="admin-form"
          action="{{ $guru->exists ? route('admin.guru.update', $guru) : route('admin.guru.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @if($guru->exists) @method('PUT') @endif

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $guru->nama) }}" required>
            @error('nama') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" name="jabatan" value="{{ old('jabatan', $guru->jabatan) }}">
            @error('jabatan') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Urutan Tampil</label>
            <input type="number" name="urutan" value="{{ old('urutan', $guru->urutan) }}">
            @error('urutan') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Foto</label>
            @if($guru->foto)
                <div class="current-photo">
                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto saat ini">
                </div>
            @endif
            <input type="file" name="foto" accept="image/*">
            @error('foto') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save">Simpan</button>
            <a href="{{ route('admin.guru.index') }}" class="btn-cancel">Batal</a>
        </div>
    </form>
@endsection
