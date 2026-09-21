@extends('layouts.admin')

@section('title', $ekskul->exists ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler')

@section('content')
    <h1>{{ $ekskul->exists ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler' }}</h1>

    <form class="admin-form"
          action="{{ $ekskul->exists ? route('admin.ekstrakurikuler.update', $ekskul) : route('admin.ekstrakurikuler.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @if($ekskul->exists) @method('PUT') @endif

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $ekskul->nama) }}" required>
            @error('nama') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi">{{ old('deskripsi', $ekskul->deskripsi) }}</textarea>
            @error('deskripsi') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Urutan Tampil</label>
            <input type="number" name="urutan" value="{{ old('urutan', $ekskul->urutan) }}">
            @error('urutan') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <h2 style="font-size:16px; margin:28px 0 14px; padding-top:14px; border-top:1px solid #e5e7eb;">Info Kegiatan</h2>

        <div class="form-group">
            <label>Hari Latihan</label>
            <input type="text" name="jadwal_hari" value="{{ old('jadwal_hari', $ekskul->jadwal_hari) }}" placeholder="Contoh: Setiap Sabtu">
            @error('jadwal_hari') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Waktu</label>
            <input type="text" name="jadwal_waktu" value="{{ old('jadwal_waktu', $ekskul->jadwal_waktu) }}" placeholder="Contoh: Pukul 14.00 - 16.30 WIB">
            @error('jadwal_waktu') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="jadwal_lokasi" value="{{ old('jadwal_lokasi', $ekskul->jadwal_lokasi) }}" placeholder="Contoh: Lapangan SMK N 1 Cijati">
            @error('jadwal_lokasi') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <h2 style="font-size:16px; margin:28px 0 14px; padding-top:14px; border-top:1px solid #e5e7eb;">Guru Pembina</h2>

        <div class="form-group">
            <label>Nama Pembina</label>
            <input type="text" name="pembina_nama" value="{{ old('pembina_nama', $ekskul->pembina_nama) }}">
            @error('pembina_nama') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Jabatan Pembina</label>
            <input type="text" name="pembina_jabatan" value="{{ old('pembina_jabatan', $ekskul->pembina_jabatan) }}" placeholder="Contoh: Guru Pembina Ekstrakurikuler">
            @error('pembina_jabatan') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Foto Pembina</label>
            @if($ekskul->pembina_foto)
                <div class="current-photo">
                    <img src="{{ asset('storage/' . $ekskul->pembina_foto) }}" alt="Foto pembina saat ini">
                </div>
            @endif
            <input type="file" name="pembina_foto" accept="image/*">
            @error('pembina_foto') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Sambutan Pembina</label>
            <textarea name="pembina_sambutan">{{ old('pembina_sambutan', $ekskul->pembina_sambutan) }}</textarea>
            @error('pembina_sambutan') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <h2 style="font-size:16px; margin:28px 0 14px; padding-top:14px; border-top:1px solid #e5e7eb;">Logo &amp; Foto Kegiatan</h2>

        <div class="form-group">
            <label>Logo</label>
            @if($ekskul->logo)
                <div class="current-photo">
                    <img src="{{ asset('storage/' . $ekskul->logo) }}" alt="Logo saat ini">
                </div>
            @endif
            <input type="file" name="logo" accept="image/*">
            @error('logo') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Foto Kegiatan (ditampilkan di halaman Ekstrakurikuler)</label>

            @if($ekskul->exists && $ekskul->fotos && $ekskul->fotos->count())
                <div style="display:flex; flex-wrap:wrap; gap:12px; margin-bottom:14px;">
                    @foreach($ekskul->fotos as $foto)
                        <img src="{{ asset('storage/' . $foto->file) }}"
                             alt="Foto kegiatan"
                             style="width:110px; height:110px; object-fit:cover; border-radius:8px;">
                    @endforeach
                </div>
            @endif

            <input type="file" name="fotos[]" accept="image/*" multiple>
            <p style="font-size:12px; color:#6b7280; margin-top:6px;">
                Bisa pilih beberapa foto sekaligus. Foto baru akan ditambahkan, bukan menggantikan foto lama.
            </p>
            @error('fotos') <div class="error-text">{{ $message }}</div> @enderror
            @error('fotos.*') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save">Simpan</button>
            <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn-cancel">Batal</a>
        </div>
    </form>

    @if($ekskul->exists && $ekskul->fotos && $ekskul->fotos->count())
        <div class="admin-form" style="margin-top:24px;">
            <h2 style="font-size:16px; margin-bottom:12px;">Kelola Foto Kegiatan</h2>
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #e5e7eb;">Foto</th>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #e5e7eb;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ekskul->fotos as $foto)
                        <tr>
                            <td style="padding:8px; border-bottom:1px solid #f1f5f9;">
                                <img src="{{ asset('storage/' . $foto->file) }}" alt="Foto kegiatan"
                                     style="width:70px; height:70px; object-fit:cover; border-radius:6px;">
                            </td>
                            <td style="padding:8px; border-bottom:1px solid #f1f5f9;">
                                <form action="{{ route('admin.ekstrakurikuler.foto.destroy', $foto) }}" method="POST"
                                      onsubmit="return confirm('Hapus foto ini?');">
                                    @csrf
                                    <button type="submit" class="btn-cancel" style="color:#dc2626; border:none; background:none; cursor:pointer; padding:0;">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection