<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\View\View;

class EkstrakurikulerController extends Controller
{
    public function index(): View
    {
        $ekskuls = Ekstrakurikuler::with('fotos')->orderBy('urutan')->get();

        return view('ekstrakurikuler', compact('ekskuls'));
    }

    public function show(string $slug): View
    {
        $ekskul = Ekstrakurikuler::with('fotos')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('ekstrakurikuler.show', compact('ekskul'));
    }
}