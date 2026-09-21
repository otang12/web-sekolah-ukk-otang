<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    protected function rules(): array
    {
        return [
            'title'        => ['required', 'string', 'max:255'],
            'category'     => ['nullable', 'string', 'max:100'],
            'excerpt'      => ['nullable', 'string'],
            'body'         => ['required', 'string'],
            'author'       => ['nullable', 'string', 'min:3', 'max:255', 'regex:/^[\pL\s\.,\'\-]+$/u'],
            'published_at' => ['nullable', 'date'],
            'image'        => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:4096'],
        ];
    }

    protected function messages(): array
    {
        return [
            'author.regex' => 'Nama penulis hanya boleh huruf, spasi, titik, dan koma — tidak boleh angka atau simbol.',
        ];
    }

    public function index()
    {
        $newsList = News::orderByDesc('published_at')->get();
        return view('admin.news.index', compact('newsList'));
    }

    public function create()
    {
        $news = new News();
        return view('admin.news.form', compact('news'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules(), $this->messages());

        $data['slug'] = Str::slug($data['title']) . '-' . uniqid();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('status', 'Berita berhasil ditambahkan.');
    }

    public function edit(News $news)
    {
        return view('admin.news.form', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate($this->rules(), $this->messages());

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('status', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();

        return redirect()->route('admin.news.index')->with('status', 'Berita berhasil dihapus.');
    }
}