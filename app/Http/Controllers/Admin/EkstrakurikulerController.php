<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use App\Models\EkstrakurikulerFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EkstrakurikulerController extends Controller
{
    protected function rules(): array
    {
        return [
            'nama'              => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\pL\s\.,\'\-]+$/u'],
            'deskripsi'         => ['nullable', 'string'],
            'urutan'            => ['nullable', 'integer', 'min:0'],
            'logo'              => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'fotos'             => ['nullable', 'array'],
            'fotos.*'           => ['image', 'mimes:jpg,jpeg,png', 'max:2048'],

            'jadwal_hari'       => ['nullable', 'string', 'max:100'],
            'jadwal_waktu'      => ['nullable', 'string', 'max:100'],
            'jadwal_lokasi'     => ['nullable', 'string', 'max:255'],

            'pembina_nama'      => ['nullable', 'string', 'max:255'],
            'pembina_jabatan'   => ['nullable', 'string', 'max:255'],
            'pembina_foto'      => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'pembina_sambutan'  => ['nullable', 'string'],
        ];
    }

    protected function messages(): array
    {
        return [
            'nama.regex' => 'Nama ekstrakurikuler hanya boleh huruf, spasi, titik, dan koma — tidak boleh angka atau simbol.',
        ];
    }

    public function index()
    {
        $ekskuls = Ekstrakurikuler::orderBy('urutan')->get();
        return view('admin.ekstrakurikuler.index', compact('ekskuls'));
    }

    public function create()
    {
        $ekskul = new Ekstrakurikuler();
        return view('admin.ekstrakurikuler.form', compact('ekskul'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules(), $this->messages());

        $data['slug'] = Str::slug($data['nama']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('ekstrakurikuler', 'public');
        }

        if ($request->hasFile('pembina_foto')) {
            $data['pembina_foto'] = $request->file('pembina_foto')->store('ekstrakurikuler/pembina', 'public');
        }

        $fotos = $data['fotos'] ?? [];
        unset($data['fotos']);

        $ekskul = Ekstrakurikuler::create($data);

        $this->simpanFotoKegiatan($ekskul, $fotos);

        return redirect()->route('admin.ekstrakurikuler.index')->with('status', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->load('fotos');
        $ekskul = $ekstrakurikuler;
        return view('admin.ekstrakurikuler.form', compact('ekskul'));
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $data = $request->validate($this->rules(), $this->messages());

        $data['slug'] = Str::slug($data['nama']);

        if ($request->hasFile('logo')) {
            if ($ekstrakurikuler->logo) {
                Storage::disk('public')->delete($ekstrakurikuler->logo);
            }
            $data['logo'] = $request->file('logo')->store('ekstrakurikuler', 'public');
        }

        if ($request->hasFile('pembina_foto')) {
            if ($ekstrakurikuler->pembina_foto) {
                Storage::disk('public')->delete($ekstrakurikuler->pembina_foto);
            }
            $data['pembina_foto'] = $request->file('pembina_foto')->store('ekstrakurikuler/pembina', 'public');
        }

        $fotos = $data['fotos'] ?? [];
        unset($data['fotos']);

        $ekstrakurikuler->update($data);

        $this->simpanFotoKegiatan($ekstrakurikuler, $fotos);

        return redirect()->route('admin.ekstrakurikuler.index')->with('status', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        if ($ekstrakurikuler->logo) {
            Storage::disk('public')->delete($ekstrakurikuler->logo);
        }
        if ($ekstrakurikuler->pembina_foto) {
            Storage::disk('public')->delete($ekstrakurikuler->pembina_foto);
        }
        foreach ($ekstrakurikuler->fotos as $foto) {
            Storage::disk('public')->delete($foto->file);
        }
        $ekstrakurikuler->delete();

        return redirect()->route('admin.ekstrakurikuler.index')->with('status', 'Ekstrakurikuler berhasil dihapus.');
    }

    /**
     * Simpan file-file foto kegiatan yang baru diupload.
     */
    protected function simpanFotoKegiatan(Ekstrakurikuler $ekskul, array $fotos): void
    {
        if (empty($fotos)) {
            return;
        }

        $urutanAwal = $ekskul->fotos()->max('urutan') ?? 0;

        foreach ($fotos as $i => $file) {
            if (!$file) {
                continue;
            }
            $path = $file->store('ekstrakurikuler/kegiatan', 'public');

            EkstrakurikulerFoto::create([
                'ekstrakurikuler_id' => $ekskul->id,
                'file'               => $path,
                'urutan'             => $urutanAwal + $i + 1,
            ]);
        }
    }

    /**
     * Hapus satu foto kegiatan.
     */
    public function destroyFoto(EkstrakurikulerFoto $foto)
    {
        $ekskulId = $foto->ekstrakurikuler_id;

        if ($foto->file) {
            Storage::disk('public')->delete($foto->file);
        }
        $foto->delete();

        $ekskul = Ekstrakurikuler::find($ekskulId);

        if ($ekskul) {
            return redirect()
                ->route('admin.ekstrakurikuler.edit', $ekskul)
                ->with('status', 'Foto kegiatan berhasil dihapus.');
        }

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('status', 'Foto kegiatan berhasil dihapus.');
    }
}