<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $photos = Galeri::orderBy('urutan')->get();
        return view('admin.galeri.index', compact('photos'));
    }

    public function create()
    {
        $galeri = new Galeri();
        return view('admin.galeri.form', compact('galeri'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'caption' => 'nullable|string|max:255',
            'urutan'  => 'nullable|integer',
            'file'    => 'required|image|max:4096',
        ]);

        $data['file'] = $request->file('file')->store('galeri', 'public');

        Galeri::create($data);

        return redirect()->route('admin.galeri.index')->with('status', 'Foto berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.form', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $data = $request->validate([
            'caption' => 'nullable|string|max:255',
            'urutan'  => 'nullable|integer',
            'file'    => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('file')) {
            if ($galeri->file) {
                Storage::disk('public')->delete($galeri->file);
            }
            $data['file'] = $request->file('file')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('status', 'Foto berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->file) {
            Storage::disk('public')->delete($galeri->file);
        }
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('status', 'Foto berhasil dihapus.');
    }
}
