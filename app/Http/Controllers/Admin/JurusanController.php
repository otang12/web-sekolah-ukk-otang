<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\JurusanFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JurusanController extends Controller
{
    protected function rules(): array
    {
        return [
            'nama'                       => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\pL\s\.,\'\-]+$/u'],
            'singkatan'                  => ['nullable', 'string', 'max:50', 'regex:/^[\pL\s]+$/u'],
            'deskripsi'                  => ['nullable', 'string'],
            'deskripsi_panjang'          => ['nullable', 'string'],
            'kepala_nama'                => ['nullable', 'string', 'min:3', 'max:255', 'regex:/^[\pL\s\.,\'\-]+$/u'],
            'logo'                       => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'kepala_foto'                => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'fotos'                      => ['nullable', 'array'],
            'fotos.*'                    => ['image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'mata_pelajaran'             => ['nullable', 'array'],
            'mata_pelajaran.*.nama'      => ['nullable', 'string', 'max:255'],
            'mata_pelajaran.*.deskripsi' => ['nullable', 'string', 'max:1000'],
        ];
    }

    protected function messages(): array
    {
        return [
            'nama.regex'        => 'Nama jurusan hanya boleh huruf, spasi, titik, dan koma — tidak boleh angka atau simbol.',
            'singkatan.regex'   => 'Singkatan hanya boleh berisi huruf (mis. RPL, BDP) — tidak boleh angka atau simbol.',
            'kepala_nama.regex' => 'Nama kepala jurusan hanya boleh huruf, spasi, titik, dan koma — tidak boleh angka atau simbol.',
        ];
    }

    public function index()
    {
        $jurusans = Jurusan::orderBy('id')->get();
        return view('admin.jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        $jurusan = new Jurusan();
        return view('admin.jurusan.form', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules(), $this->messages());

        $data['slug'] = Str::slug($data['nama']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('jurusan', 'public');
        }
        if ($request->hasFile('kepala_foto')) {
            $data['kepala_foto'] = $request->file('kepala_foto')->store('jurusan/kepala', 'public');
        }

        $data['mata_pelajaran'] = $this->bersihkanMataPelajaran($data['mata_pelajaran'] ?? []);

        // Buang key 'fotos' supaya tidak ikut ke Jurusan::create (bukan kolom di tabel jurusans)
        $fotos = $data['fotos'] ?? [];
        unset($data['fotos']);

        $jurusan = Jurusan::create($data);

        $this->simpanFotoKegiatan($jurusan, $fotos);

        return redirect()->route('admin.jurusan.index')->with('status', 'Jurusan berhasil ditambahkan.');
    }

    public function edit(Jurusan $jurusan)
    {
        $jurusan->load('fotos');
        return view('admin.jurusan.form', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $data = $request->validate($this->rules(), $this->messages());

        $data['slug'] = Str::slug($data['nama']);

        if ($request->hasFile('logo')) {
            if ($jurusan->logo) {
                Storage::disk('public')->delete($jurusan->logo);
            }
            $data['logo'] = $request->file('logo')->store('jurusan', 'public');
        }
        if ($request->hasFile('kepala_foto')) {
            if ($jurusan->kepala_foto) {
                Storage::disk('public')->delete($jurusan->kepala_foto);
            }
            $data['kepala_foto'] = $request->file('kepala_foto')->store('jurusan/kepala', 'public');
        }

        $data['mata_pelajaran'] = $this->bersihkanMataPelajaran($data['mata_pelajaran'] ?? []);

        $fotos = $data['fotos'] ?? [];
        unset($data['fotos']);

        $jurusan->update($data);

        $this->simpanFotoKegiatan($jurusan, $fotos);

        return redirect()->route('admin.jurusan.index')->with('status', 'Jurusan berhasil diperbarui.');
    }

    public function destroy(Jurusan $jurusan)
    {
        if ($jurusan->logo) {
            Storage::disk('public')->delete($jurusan->logo);
        }
        if ($jurusan->kepala_foto) {
            Storage::disk('public')->delete($jurusan->kepala_foto);
        }
        foreach ($jurusan->fotos as $foto) {
            Storage::disk('public')->delete($foto->file);
        }
        $jurusan->delete();

        return redirect()->route('admin.jurusan.index')->with('status', 'Jurusan berhasil dihapus.');
    }

    /**
     * Buang baris mata pelajaran yang namanya kosong (baris kosong dari form dinamis),
     * dan susun ulang index-nya supaya rapi sebelum disimpan sebagai JSON.
     */
    protected function bersihkanMataPelajaran(array $mataPelajaran): array
    {
        $bersih = array_filter($mataPelajaran, function ($item) {
            return !empty(trim($item['nama'] ?? ''));
        });

        return array_values(array_map(function ($item) {
            return [
                'nama'      => trim($item['nama']),
                'deskripsi' => trim($item['deskripsi'] ?? ''),
            ];
        }, $bersih));
    }

    /**
     * Simpan file-file foto kegiatan (kolase) yang baru diupload untuk sebuah jurusan.
     */
    protected function simpanFotoKegiatan(Jurusan $jurusan, array $fotos): void
    {
        if (empty($fotos)) {
            return;
        }

        $urutanAwal = $jurusan->fotos()->max('urutan') ?? 0;

        foreach ($fotos as $i => $file) {
            if (!$file) {
                continue;
            }
            $path = $file->store('jurusan/kegiatan', 'public');

            JurusanFoto::create([
                'jurusan_id' => $jurusan->id,
                'file'       => $path,
                'urutan'     => $urutanAwal + $i + 1,
            ]);
        }
    }

    /**
     * Hapus satu foto kegiatan.
     */
    public function destroyFoto(JurusanFoto $foto)
    {
        $jurusanId = $foto->jurusan_id;

        if ($foto->file) {
            Storage::disk('public')->delete($foto->file);
        }
        $foto->delete();

        $jurusan = Jurusan::find($jurusanId);

        if ($jurusan) {
            return redirect()
                ->route('admin.jurusan.edit', $jurusan)
                ->with('status', 'Foto kegiatan berhasil dihapus.');
        }

        return redirect()
            ->route('admin.jurusan.index')
            ->with('status', 'Foto kegiatan berhasil dihapus.');
    }
}