<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::orderBy('urutan')->get();
        return view('admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        $guru = new Guru();
        return view('admin.guru.form', compact('guru'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'    => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\pL\s\.,\'\-]+$/u'],
            'jabatan' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\pL\s\.,&\'\-]+$/u'],
            'urutan'  => ['nullable', 'integer', 'min:0'],
            'foto'    => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ], [
           'nama.regex' => 'Nama hanya boleh huruf, spasi, titik, dan koma — tidak boleh angka atau simbol.',
           'jabatan.regex' => 'Jabatan hanya boleh huruf, spasi, titik, koma, dan tanda &.',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        Guru::create($data);

        return redirect()->route('admin.guru.index')->with('status', 'Data guru berhasil ditambahkan.');
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.form', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $data = $request->validate([
            'nama'    => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\pL\s\.,\'\-]+$/u'],
            'jabatan' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\pL\s\.,&\'\-]+$/u'],
            'urutan'  => ['nullable', 'integer', 'min:0'],
            'foto'    => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ], [
           'nama.regex' => 'Nama hanya boleh huruf, spasi, titik, dan koma — tidak boleh angka atau simbol.',
           'jabatan.regex' => 'Jabatan hanya boleh huruf, spasi, titik, koma, dan tanda &.',
        ]);

        if ($request->hasFile('foto')) {
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($data);

        return redirect()->route('admin.guru.index')->with('status', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }
        $guru->delete();

        return redirect()->route('admin.guru.index')->with('status', 'Data guru berhasil dihapus.');
    }
}