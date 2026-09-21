@extends('layouts.admin')

@section('title', $jurusan->exists ? 'Edit Jurusan' : 'Tambah Jurusan')

@section('content')
    <h1>{{ $jurusan->exists ? 'Edit Jurusan' : 'Tambah Jurusan' }}</h1>

    <form class="admin-form"
          action="{{ $jurusan->exists ? route('admin.jurusan.update', $jurusan) : route('admin.jurusan.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @if($jurusan->exists) @method('PUT') @endif

        <div class="form-group">
            <label>Nama Jurusan</label>
            <input type="text" name="nama" value="{{ old('nama', $jurusan->nama) }}" required>
            @error('nama') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Singkatan</label>
            <input type="text" name="singkatan" value="{{ old('singkatan', $jurusan->singkatan) }}" placeholder="Contoh: RPL">
            @error('singkatan') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi Singkat</label>
            <textarea name="deskripsi">{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>
            @error('deskripsi') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi Lengkap (halaman detail jurusan)</label>
            <textarea name="deskripsi_panjang" style="min-height:160px">{{ old('deskripsi_panjang', $jurusan->deskripsi_panjang) }}</textarea>
            @error('deskripsi_panjang') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Mata Pelajaran Keahlian (halaman detail jurusan)</label>
            <p style="font-size:12px; color:#6b7280; margin-bottom:10px;">
                Daftar mata pelajaran yang tampil di bagian "Mata Pelajaran Keahlian". Kosongkan semua baris kalau tidak ingin bagian ini muncul di halaman.
            </p>

            <div id="mapel-wrap">
                @php
                    $mapelLama = old('mata_pelajaran', $jurusan->mata_pelajaran ?? []);
                    if (empty($mapelLama)) {
                        $mapelLama = [['nama' => '', 'deskripsi' => '']];
                    }
                @endphp

                @foreach($mapelLama as $i => $mapel)
                    <div class="mapel-row" style="display:flex; gap:10px; margin-bottom:10px; align-items:flex-start;">
                        <div style="flex:1 1 220px;">
                            <input type="text"
                                   name="mata_pelajaran[{{ $i }}][nama]"
                                   value="{{ $mapel['nama'] ?? '' }}"
                                   placeholder="Nama mata pelajaran, contoh: Pemrograman Dasar">
                        </div>
                        <div style="flex:2 1 320px;">
                            <input type="text"
                                   name="mata_pelajaran[{{ $i }}][deskripsi]"
                                   value="{{ $mapel['deskripsi'] ?? '' }}"
                                   placeholder="Deskripsi singkat (opsional)">
                        </div>
                        <button type="button" class="btn-cancel mapel-remove"
                                style="border:none; background:none; color:#dc2626; cursor:pointer; padding:8px 4px;">
                            Hapus
                        </button>
                    </div>
                @endforeach
            </div>

            <button type="button" id="mapel-add" class="btn-cancel" style="margin-top:4px;">
                + Tambah Mata Pelajaran
            </button>

            @error('mata_pelajaran') <div class="error-text">{{ $message }}</div> @enderror
            @error('mata_pelajaran.*.nama') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Nama Kepala Jurusan</label>
            <input type="text" name="kepala_nama" value="{{ old('kepala_nama', $jurusan->kepala_nama) }}">
            @error('kepala_nama') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Logo Jurusan</label>
            @if($jurusan->logo)
                <div class="current-photo">
                    <img src="{{ asset('storage/' . $jurusan->logo) }}" alt="Logo saat ini">
                </div>
            @endif
            <input type="file" name="logo" accept="image/*">
            @error('logo') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Foto Kepala Jurusan</label>
            @if($jurusan->kepala_foto)
                <div class="current-photo">
                    <img src="{{ asset('storage/' . $jurusan->kepala_foto) }}" alt="Foto kepala jurusan saat ini">
                </div>
            @endif
            <input type="file" name="kepala_foto" accept="image/*">
            @error('kepala_foto') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Foto Kegiatan (Kolase di halaman Profil &amp; Jurusan)</label>

            @if($jurusan->exists && $jurusan->fotos && $jurusan->fotos->count())
                <div class="foto-kegiatan-grid" style="display:flex; flex-wrap:wrap; gap:12px; margin-bottom:14px;">
                    @foreach($jurusan->fotos as $foto)
                        <div class="foto-kegiatan-item" style="position:relative; width:110px;">
                            <img src="{{ asset('storage/' . $foto->file) }}"
                                 alt="Foto kegiatan"
                                 style="width:110px; height:110px; object-fit:cover; border-radius:8px; display:block;">
                        </div>
                    @endforeach
                </div>
                <p style="font-size:13px; color:#6b7280; margin-bottom:14px;">
                    Untuk menghapus salah satu foto di atas, gunakan tombol hapus pada tabel di bawah setelah menyimpan halaman ini, atau hubungi saya jika ingin tombol hapus langsung di sini.
                </p>
            @endif

            <input type="file" name="fotos[]" accept="image/*" multiple>
            <p style="font-size:12px; color:#6b7280; margin-top:6px;">
                Bisa pilih beberapa foto sekaligus (tahan Ctrl saat memilih file). Foto baru akan ditambahkan, bukan menggantikan foto lama.
            </p>
            @error('fotos') <div class="error-text">{{ $message }}</div> @enderror
            @error('fotos.*') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save">Simpan</button>
            <a href="{{ route('admin.jurusan.index') }}" class="btn-cancel">Batal</a>
        </div>
    </form>

    @if($jurusan->exists && $jurusan->fotos && $jurusan->fotos->count())
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
                    @foreach($jurusan->fotos as $foto)
                        <tr>
                            <td style="padding:8px; border-bottom:1px solid #f1f5f9;">
                                <img src="{{ asset('storage/' . $foto->file) }}" alt="Foto kegiatan"
                                     style="width:70px; height:70px; object-fit:cover; border-radius:6px;">
                            </td>
                            <td style="padding:8px; border-bottom:1px solid #f1f5f9;">
                                <form action="{{ route('admin.jurusan.foto.destroy', $foto) }}" method="POST"
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const wrap = document.getElementById('mapel-wrap');
            const addBtn = document.getElementById('mapel-add');
            let index = wrap.querySelectorAll('.mapel-row').length;

            function buatBaris() {
                const row = document.createElement('div');
                row.className = 'mapel-row';
                row.style.cssText = 'display:flex; gap:10px; margin-bottom:10px; align-items:flex-start;';
                row.innerHTML = `
                    <div style="flex:1 1 220px;">
                        <input type="text" name="mata_pelajaran[${index}][nama]" placeholder="Nama mata pelajaran, contoh: Pemrograman Dasar">
                    </div>
                    <div style="flex:2 1 320px;">
                        <input type="text" name="mata_pelajaran[${index}][deskripsi]" placeholder="Deskripsi singkat (opsional)">
                    </div>
                    <button type="button" class="btn-cancel mapel-remove" style="border:none; background:none; color:#dc2626; cursor:pointer; padding:8px 4px;">
                        Hapus
                    </button>
                `;
                wrap.appendChild(row);
                index++;
            }

            addBtn.addEventListener('click', buatBaris);

            wrap.addEventListener('click', function (e) {
                if (e.target.classList.contains('mapel-remove')) {
                    const rows = wrap.querySelectorAll('.mapel-row');
                    if (rows.length > 1) {
                        e.target.closest('.mapel-row').remove();
                    } else {
                        // Baris terakhir: kosongkan saja isinya, jangan dihapus semua.
                        e.target.closest('.mapel-row').querySelectorAll('input').forEach(function (input) {
                            input.value = '';
                        });
                    }
                }
            });
        });
    </script>
@endsection